<?php

namespace App\Controller;

use App\Service\Calculator\Calculator;
use App\Service\Calculator\DivisionOperation;
use App\Service\Calculator\MinusOperation;
use App\Service\Calculator\MultiplicationOperation;
use App\Service\Calculator\PlusOperation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculator", name="calculator")
     *
     * @return Response
     * @throws \Exception
     */
    public function index(Request $request): Response
    {
        $calculator = new Calculator();
        $calculator->addOperation(new PlusOperation())
            ->addOperation(new MinusOperation())
            ->addOperation(new MultiplicationOperation())
            ->addOperation(new DivisionOperation());
//        dump($calculator->getOperationsForForm());
        $form = $this->createFormBuilder()
            ->add('firstNumber', NumberType::class)
            ->add('operation', ChoiceType::class, ['choices' => $calculator->getOperationsForForm()])
            ->add('secondNumber', NumberType::class)
            ->add('calculate', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $operation = $form->get('operation')->getData();
                $firstNumber = $form->get('firstNumber')->getData();
                $secondNumber = $form->get('secondNumber')->getData();
                $result = $calculator->evaluate($operation, $firstNumber, $secondNumber);
                $message = "The result of $firstNumber $operation $secondNumber = $result";
            } catch (\Throwable $e) {
                $message = $e->getMessage();
            }

            return $this->render('calculator/result.html.twig', [
                'message' => $message
            ]);
        }

        return $this->renderForm('calculator/index.html.twig', [
           'form' => $form
        ]);
    }
}
