<?php

namespace App\Service\Calculator;

class MinusOperation extends AbstractCalculatorOperation
{
    /**
     * @inheritDoc
     */
    public function evaluate(float $first, float $second): float|string
    {
        return $first - $second;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'minus';
    }

    /**
     * @inheritDoc
     */
    public function getSign(): string
    {
        return '-';
    }
}
