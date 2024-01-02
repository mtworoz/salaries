<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";

use App\Controller\CalculatorController;

$request = $_SERVER['REQUEST_URI'];

$parts = explode("/", $_SERVER['REQUEST_URI']);

if($parts[1] != "api") {
    http_response_code(404);
    exit();
}

if($parts[2] != "calculator") {
    http_response_code(404);
    exit();
}

$calculatorController = new CalculatorController();

var_dump($calculatorController->processRequest($parts[3], $parts[4]));

