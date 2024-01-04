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
        $decodedNetSalary = json_decode($netSalary, true);
        $this->assertNotNull($decodedNetSalary['netto'], 'Invalid JSON response');

        $expectedSalaryArray = [
            "brutto" => 5000,
            "healthInsurance" => 388.31,
            "tax" => 187,
            "netto" => 3739.19,
            "retirement" => 488,
            "disabilityPension" => 75,
            "sicknessContribution" => 122.5
        ];

        $this->assertEquals($expectedSalaryArray, $decodedNetSalary, 'Invalid salary calculation');
    }
}

