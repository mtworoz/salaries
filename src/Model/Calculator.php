<?php

namespace App\Model;

use App\Interfaces\SalaryCalculatorInterface;
use App\Model\Output\Salary;

class Calculator implements SalaryCalculatorInterface
{
    public function calculateOutputResults()
    {
        $salary = new Salary();
        return 4000;
    }

    public function add($a, $b)
    {
        return $a + $b;
    }
}
