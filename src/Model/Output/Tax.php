<?php

namespace App\Model\Output;

class Tax
{
    const EARNING_COSTS = 250;
    const TAX_REDUCTION = 300;

    private float $taxBase;
    private float $tax;

    public function __construct(float $healthAssessmentBasis)
    {
        $this->taxBase = round($healthAssessmentBasis - self::EARNING_COSTS);
        $this->tax = $this->calculateTax($this->taxBase);
    }

    public function getTaxBase(): float
    {
        return $this->taxBase;
    }

    public function getTax(): float
    {
        return $this->tax;
    }

    public function calculateTax(float $taxBase): float
    {
        if ($taxBase <= 0) {
            return 0;
        }

        return floor($taxBase * 0.12) - self::TAX_REDUCTION;
    }
}
