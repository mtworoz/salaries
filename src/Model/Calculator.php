<?php

namespace App\Model;

use App\Interfaces\SalaryCalculatorInterface;

class Calculator implements SalaryCalculatorInterface
{
    public function calculateOutputResults() : Salary
    {
        $salary = new Salary();
        $salary->setNet($this->calculateNet());
        $salary->setGross($this->calculateGross());
        $salary->setCost($this->calculateCost());
        return $salary;
    }

    public function add($a, $b)
    {
        return $a + $b;
    }
}
