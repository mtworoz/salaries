<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Calculator;

class SalaryCalculatorTest extends TestCase
{
    public function testCalculateNettoSalary()
    {
        $calculator = new Calculator();

        $netSalary = $calculator->calculateOutputResults(5000);

        $expectedNetSalary = 3738.19;
        $this->assertEquals($expectedNetSalary, $netSalary);
    }
}

