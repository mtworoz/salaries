<?php

use PHPUnit\Framework\TestCase;
use App\Model\Calculator;

class SalaryCalculatorTest extends TestCase
{
    public function testCalculateNettoSalary()
    {
        $calculator = new Calculator();

        $netSalary = $calculator->calculateOutputResults();

        $expectedNetSalary = 4000;
        $this->assertEquals($expectedNetSalary, $netSalary);
    }
}

