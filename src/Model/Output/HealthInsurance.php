<?php

namespace App\Model\Output;

class HealthInsurance
{
    public float $healthInsurance;
    private float $assessmentBasis;

    public function __construct(float $brutto, float $zus)
    {
        $this->assessmentBasis = $brutto - $zus;
        $this->healthInsurance = $this->calculateHealthInsurance($this->assessmentBasis);
    }

    /**
     * @return float
     */
    public function getHealthInsurance(): float
    {
        return $this->healthInsurance;
    }

    /**
     * @return float
     */
    public function getAssessmentBasis(): float
    {
        return $this->assessmentBasis;
    }

    public function calculateHealthInsurance(float $assessmentBasis): float
    {
        return round(($assessmentBasis) * 0.09,2);
    }

}
