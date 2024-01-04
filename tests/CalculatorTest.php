<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Calculator;

class SalaryCalculatorTest extends TestCase
{
    public function testCalculateNetSalary()
    {
        $calculator = new Calculator();

        $netSalary = $calculator->calculateOutputResults(5000);
        $decodedNetSalary = json_decode($netSalary, true);
        $this->assertNotNull($decodedNetSalary['net'], 'Invalid JSON response');

        $expectedSalaryArray = [
            "gross" => 5000,
            "healthInsurance" => 388.31,
            "tax" => 187,
            "net" => 3739.19,
            "retirement" => 488,
            "disabilityPension" => 75,
            "sicknessContribution" => 122.5
        ];

        $this->assertEquals($expectedSalaryArray, $decodedNetSalary, 'Invalid salary calculation');
    }
}

