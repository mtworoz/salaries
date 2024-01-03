<?php

namespace App\Interfaces;

use App\Model\Salary;

interface SalaryCalculatorInterface
{
    public function calculateOutputResults() : Salary;
}
