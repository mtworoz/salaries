<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Output\HealthInsurance;

class HealthInsuranceTest extends TestCase
{
    public function testCalculateHealthInsurance()
    {
        $healthInsurance = new HealthInsurance(5000, 685.5);

        $expectedAssessmentBasis = 4314.5;
        $expectedHealthInsurance = 388.31;

        $this->assertEquals($expectedAssessmentBasis, $healthInsurance->getAssessmentBasis());
        $this->assertEquals($expectedHealthInsurance, $healthInsurance->getHealthInsurance());

    }

}
