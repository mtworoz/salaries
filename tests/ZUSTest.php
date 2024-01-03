<?php

namespace App\Tests;

use App\Model\Output\ZUS;
use PHPUnit\Framework\TestCase;

class ZUSTest extends TestCase
{
    public function testCalculateZUS()
    {
        $zus = new ZUS(5000);

        $expectedRetirement = 488;
        $this->assertEquals($expectedRetirement, $zus->getRetirement());

        $expectedDisabilityPension = 75;
        $this->assertEquals($expectedDisabilityPension, $zus->getDisabilityPension());

        $expectedSicknessContribution = 122.5;
        $this->assertEquals($expectedSicknessContribution, $zus->getSicknessContribution());

        $expectedZUS = 685.5;
        $this->assertEquals($expectedZUS, $zus->getTotal());
    }
}
