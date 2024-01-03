<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Output\Tax;

class TaxTest extends TestCase
{
    public function testCalculateTax()
    {
        $tax = new Tax(4335.21);

        $expectedTax = 190;
        $this->assertEquals($expectedTax, $tax->getTax());
    }


}
