<?php

namespace App\Model\Output;

class ZUS
{
    public float $retirement;

    public float $disabilityPension;

    public float $sicknessContribution;

    public function __construct(float $gross)
    {
        $this->setRetirement($gross);
        $this->setDisabilityPension($gross);
        $this->setSicknessContribution($gross);
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
     * @param float $gross
     */
    public function setRetirement(float $gross) : void
    {
        $this->retirement = round($gross * 0.0976,2);
    }

    /**
     * @param float $gross
     */
    public function setDisabilityPension(float $gross) : void
    {
        $this->disabilityPension = round($gross * 0.015,2);
    }

    public function setSicknessContribution(float $gross) : void
    {
        $this->sicknessContribution = round($gross * 0.0245,2);
    }

}
