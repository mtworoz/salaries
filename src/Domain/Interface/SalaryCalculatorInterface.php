<?php

namespace App\Domain\Interface;

interface SalaryCalculatorInterface
{
    public function calculateOutputResults(float $gross) : string;
}
