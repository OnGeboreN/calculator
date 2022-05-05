<?php

namespace App\Service\Calculator;

class Calculator
{
    /**
     * @var int $precision
     */
    private int $precision;

    /**
     * @var array $operations
     */
    private array $operations;

    public function __construct()
    {
        $this->operations = [];
        $this->precision = 2;
    }

    /**
     * Execute the calculation
     *
     * @param string $operation
     * @param float $first
     * @param float $second
     *
     * @throws \LogicException when operation doesn't exist
     *
     * @return float
     */
    public function evaluate(string $operation, float $first, float $second): float
    {
        $operation = mb_strtolower($operation);
        if (!isset($this->operations[$operation])) {
            throw new \LogicException('Invalid operation: ' . $operation);
        }

        return number_format($this->operations[$operation]->evaluate($first, $second), $this->precision);
    }

    /**
     * @return int
     */
    public function getPrecision(): int
    {
        return $this->precision;
    }

    /**
     * @param int $precision
     * @return Calculator
     */
    public function setPrecision(int $precision): Calculator
    {
        $this->precision = $precision;
        return $this;
    }

    /**
     * @return array<CalculatorOperation>
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * @return array
     */
    public function getOperationsForForm(): array
    {
        $data = [];

        /** @var CalculatorOperation $operation */
        foreach ($this->operations as $operation) {
            $data[$operation->getSign()] = $operation->getName();
        }

        return $data;
    }

    /**
     * @param CalculatorOperation $operation
     * @return Calculator
     */
    public function addOperation(CalculatorOperation $operation): Calculator
    {
        $this->operations[strtolower($operation->getName())] = $operation;

        return $this;
    }
}
