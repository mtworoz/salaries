<?php

namespace App\Interface;

use App\Model\Output\Salary;

interface SalaryCalculatorInterface
{
    public function calculateOutputResults(float $brutto) : string;
}
