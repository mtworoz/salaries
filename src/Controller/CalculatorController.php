<?php

namespace App\Controller;

use App\Model\Calculator;

class CalculatorController
{
    /**
     * @var Calculator
     */
    private $calculator;

    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    public function processRequest($a, $b)
    {
        $result = $this->calculator->add($a, $b);
        return $result;
    }

}
