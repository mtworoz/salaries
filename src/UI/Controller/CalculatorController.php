<?php

namespace App\UI\Controller;

use App\Application\Service\CalculatorRouteService;
use App\Domain\Model\Calculator;

class CalculatorController
{
    private Calculator $calculator;
    private CalculatorRouteService $calculatorRouteService;

    public function __construct()
    {
        $this->calculator = new Calculator();
        $this->calculatorRouteService = new CalculatorRouteService();
    }

    public function processRequest(string $request) : string
    {
        $this->calculatorRouteService->checkRoute($request);

        $data = file_get_contents('php://input');
        parse_str($data, $resultArray);

        $this->calculatorRouteService->checkParameters($resultArray);

        return $this->calculator->calculateOutputResults($resultArray['gross']);
    }

}
