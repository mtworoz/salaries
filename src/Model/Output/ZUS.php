<?php

namespace App\Model\Output;

class ZUS
{
    public float $retirement;

    public float $disabilityPension;

    public float $sicknessContribution;

    public function __construct(float $brutto)
    {
        $this->setRetirement($brutto);
        $this->setDisabilityPension($brutto);
        $this->setSicknessContribution($brutto);
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

    /**
     * @param float $brutto
     */
    public function setRetirement(float $brutto) : void
    {
        $this->retirement = round($brutto * 0.0976,2);
    }

    /**
     * @param float $brutto
     */
    public function setDisabilityPension(float $brutto) : void
    {
        $this->disabilityPension = round($brutto * 0.015,2);
    }

    public function setSicknessContribution(float $brutto) : void
    {
        $this->sicknessContribution = round($brutto * 0.0245,2);
    }

}
