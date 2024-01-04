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

    public function processRequest(string $request) : string
    {
        $this->checkRoute($request);

        $data = file_get_contents('php://input');
        parse_str($data, $resultArray);

        $this->checkParameters($resultArray);

        return $this->calculator->calculateOutputResults($resultArray['brutto']);
    }

    public function checkRoute(string $request) : bool
    {
        $parts = explode("/", $request);

        if(sizeof($parts) != 3 || $parts[1] != "api" || $parts[2] != "calculator") {
            http_response_code(404);
            exit();
        }
        elseif ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit();
        }
        else {
            return true;
        }
    }

    public function checkParameters(array $resultArray) : bool
    {
        if (!isset($resultArray['brutto']) || !is_numeric($resultArray['brutto']) || $resultArray['brutto'] < 0) {
            http_response_code(400);

            $error = '';

            if (!isset($resultArray['brutto'])) {
                $error = 'Brak wymaganego parametru "brutto"';
            } elseif (!is_numeric($resultArray['brutto'])) {
                $error = 'Parametr "brutto" nie jest liczbą';
            } elseif ($resultArray['brutto'] < 0) {
                $error = 'Parametr "brutto" nie może być ujemny';
            }

            $response = array('error' => $error);
            echo json_encode($response);
            exit();
        } else {
            return true;
        }
    }

}
