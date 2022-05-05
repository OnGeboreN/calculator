<?php

namespace App\Service\Calculator;

class PlusOperation extends AbstractCalculatorOperation
{
    /**
     * @inheritDoc
     */
    public function evaluate(float $first, float $second): float
    {
        return $first + $second;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'plus';
    }

    /**
     * @inheritDoc
     */
    public function getSign(): string
    {
        return '+';
    }
}
