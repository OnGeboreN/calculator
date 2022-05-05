<?php

namespace App\Service\Calculator;

abstract class AbstractCalculatorOperation implements CalculatorOperation
{
    /**
     * @param float $first
     * @param float $second
     *
     * @return float|string
     */
    public abstract function evaluate(float $first, float $second): float|string;
}
