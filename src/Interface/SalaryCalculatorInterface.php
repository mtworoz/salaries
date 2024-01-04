<?php

namespace App\Interface;

interface SalaryCalculatorInterface
{
    public function calculateOutputResults(float $gross) : string;
}
