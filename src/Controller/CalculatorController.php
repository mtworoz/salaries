<?php

namespace App\Controller;

use App\Model\Calculator;

class CalculatorController
{
    private Calculator $calculator;

    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    public function processRequest($a, $b) : int
    {
        return $this->calculator->add($a, $b);
    }

}
