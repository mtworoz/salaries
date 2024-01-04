<?php

namespace App\Model;

use App\Interface\SalaryCalculatorInterface;
use App\Model\Output\Salary;

class Calculator implements SalaryCalculatorInterface
{
    public Salary $salary;

    public function calculateOutputResults(float $gross) : string
    {
        $this->salary = new Salary($gross);
        return $this->flattenSalaryResponse($this->salary);
    }

    public function flattenSalaryResponse(Salary $salary) : string
    {
        $salaryArray = json_decode(json_encode($salary), true);

        $flattenedArray = array_merge(
            $salaryArray,
            $salaryArray['zus'],
            $salaryArray['healthInsurance'],
            $salaryArray['tax']
        );

        unset($flattenedArray['zus']);

        return json_encode($flattenedArray, JSON_PRETTY_PRINT);
    }

}
