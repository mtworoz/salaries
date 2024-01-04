<?php

namespace App\Model\Output;

use App\Model\Output\ZUS;
use App\Model\Output\Tax;


class Salary
{
    public float $brutto;
    public ZUS $zus;
    public HealthInsurance $healthInsurance;
    public Tax $tax;
    public float $netto;

    public function __construct(float $brutto)
    {
        $this->brutto = $brutto;
        $this->setZus();
        $this->setHealthInsurance();
        $this->setTax();
        $this->setNetto();
    }

    /**
     * @return float
     */
    public function getBrutto(): float
    {
        return $this->brutto;
    }

    /**
     * @param float $brutto
     */
    public function setBrutto(float $brutto): void
    {
        $this->brutto = $brutto;
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
        $this->zus = new ZUS($this->brutto);
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
        $this->healthInsurance = new HealthInsurance($this->brutto, $this->zus->getTotal());
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
    public function getNetto(): float
    {
        return $this->netto;
    }

    public function setNetto(): void
    {
        $this->netto = round(
            $this->brutto -
            $this->zus->getTotal() -
            $this->healthInsurance->getHealthInsurance() -
            $this->tax->getTax(),
            2);
    }




}
