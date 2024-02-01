<?php

namespace App\Domain\Model\Output;

class Salary
{
    public float $gross;
    public ZUS $zus;
    public HealthInsurance $healthInsurance;
    public Tax $tax;
    public float $net;

    public function __construct(float $gross)
    {
        $this->gross = $gross;
        $this->setZus();
        $this->setHealthInsurance();
        $this->setTax();
        $this->setNet();
    }

    /**
     * @return float
     */
    public function getGross(): float
    {
        return $this->gross;
    }

    /**
     * @param float $gross
     */
    public function setGross(float $gross): void
    {
        $this->gross = $gross;
    }

    /**
     * @return ZUS
     */
    public function getZus(): ZUS
    {
        return $this->zus;
    }

    public function setZus(): void
    {
        $this->zus = new ZUS($this->gross);
    }

    /**
     * @return HealthInsurance
     */
    public function getHealthInsurance(): HealthInsurance
    {
        return $this->healthInsurance;
    }

    public function setHealthInsurance(): void
    {
        $this->healthInsurance = new HealthInsurance($this->gross, $this->zus->getTotal());
    }

    /**
     * @return Tax
     */
    public function getTax(): Tax
    {
        return $this->tax;
    }

    public function setTax(): void
    {
        $this->tax = new Tax($this->healthInsurance->getAssessmentBasis());
    }

    /**
     * @return float
     */
    public function getNet(): float
    {
        return $this->net;
    }

    public function setNet(): void
    {
        $this->net = round(
            $this->gross -
            $this->zus->getTotal() -
            $this->healthInsurance->getHealthInsurance() -
            $this->tax->getTax(),
            2);
    }

}
