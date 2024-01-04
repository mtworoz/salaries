<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";

header("Content-Type: application/json; charset=UTF-8");

use App\Controller\CalculatorController;

$request = $_SERVER['REQUEST_URI'];

$calculatorController = new CalculatorController();

echo $calculatorController->processRequest($request);

