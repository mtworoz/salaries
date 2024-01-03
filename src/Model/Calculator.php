<?php

namespace App\Model;

use App\Interfaces\SalaryCalculatorInterface;
use App\Model\Output\Salary;
use App\Model\Output\Tax;
use App\Model\Output\ZUS;
use App\Model\Output\HealthInsurance;

class Calculator implements SalaryCalculatorInterface
{
    public function calculateOutputResults(float $brutto)
    {
        $zus = new ZUS($brutto);
        $healthInsurance = new HealthInsurance($brutto, $zus->getTotal());
        $tax = new Tax($healthInsurance->getAssessmentBasis());
        return $brutto - $zus->getTotal() - $healthInsurance->getHealthInsurance() - $tax->getTax();
    }

    public function add($a, $b)
    {
        return $a + $b;
    }
}
