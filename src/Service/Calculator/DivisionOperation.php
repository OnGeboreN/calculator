<?php

namespace App\Service\Calculator;

class DivisionOperation extends AbstractCalculatorOperation
{
    /**
     * @inheritDoc
     */
    public function evaluate(float $first, float $second): float
    {
        if ($second == 0) {
            throw new \LogicException('Divide by zero not possible');
        }

        return $first / $second;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'division';
    }

    /**
     * @inheritDoc
     */
    public function getSign(): string
    {
        return '/';
    }
}
