<?php

namespace App\Service\Calculator;

interface CalculatorOperation
{
    /**
     * Get the name of the operation
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get the sign of the operation
     *
     * @return string
     */
    public function getSign(): string;
}
