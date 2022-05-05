<?php

namespace App\Service\Calculator;

interface CalculatorOperation
{
    public function getName(): string;
    public function getSign(): string;
}
