<?php

namespace App\Application\Service;

use App\Domain\Model\Output\Salary;

class JsonFormatterService
{
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
