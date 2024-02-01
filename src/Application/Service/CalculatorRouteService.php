<?php

namespace App\Application\Service;

class CalculatorRouteService
{
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
        if (!isset($resultArray['gross']) || !is_numeric($resultArray['gross']) || $resultArray['gross'] < 0) {
            http_response_code(400);

            $error = '';

            if (!isset($resultArray['gross'])) {
                $error = 'Missing required "gross" parameter';
            } elseif (!is_numeric($resultArray['gross'])) {
                $error = 'The "gross" parameter is not a number';
            } elseif ($resultArray['gross'] < 0) {
                $error = 'The "gross" parameter cannot be negative';
            }

            $response = array('error' => $error);
            echo json_encode($response);
            exit();
        } else {
            return true;
        }
    }
}

