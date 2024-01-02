<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";

header("Content-Type: application/json; charset=UTF-8");

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
elseif ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);  // Method Not Allowed
    exit();
}

$calculatorController = new CalculatorController();

echo $calculatorController->processRequest($parts[3], $parts[4]);

