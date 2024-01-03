<?php

namespace App\Model\Output;

class ZUS
{
    private float $retirement;

    private float $disabilityPension;

    private float $sicknessContribution;

    public function __construct(float $brutto)
    {
        $this->retirement = $this->calculateRetirement($brutto);
        $this->disabilityPension = $this->calculateDisabilityPension($brutto);
        $this->sicknessContribution = $this->calculateSicknessContribution($brutto);
    }

    /**
     * @return float
     */
    public function getRetirement(): float
    {
        return $this->retirement;
    }

    /**
     * @return float
     */
    public function getDisabilityPension(): float
    {
        return $this->disabilityPension;
    }

    /**
     * @return float
     */
    public function getSicknessContribution(): float
    {
        return $this->sicknessContribution;
    }

    public function getTotal(): float
    {
        return $this->retirement + $this->disabilityPension + $this->sicknessContribution;
    }

    public function calculateRetirement(float $brutto): float
    {
        return round($brutto * 0.0976,2);
    }

    public function calculateDisabilityPension(float $brutto): float
    {
        return round($brutto * 0.015,2);
    }

    public function calculateSicknessContribution(float $brutto): float
    {
        return round($brutto * 0.0245,2);
    }

}
