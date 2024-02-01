<?php

namespace App\Domain\Model;

use App\Application\Service\JsonFormatterService;
use App\Domain\Interface\SalaryCalculatorInterface;
use App\Domain\Model\Output\Salary;

class Calculator implements SalaryCalculatorInterface
{
    public Salary $salary;
    private JsonFormatterService $jsonFormatterService;

    public function __construct()
    {
        $this->jsonFormatterService = new JsonFormatterService();
    }

    public function calculateOutputResults(float $gross) : string
    {
        $this->salary = new Salary($gross);
        return $this->jsonFormatterService->flattenSalaryResponse($this->salary);
    }

}
