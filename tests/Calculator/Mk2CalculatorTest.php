<?php

namespace App\Tests\Calculator;

use App\Calculator\CalculatorInterface;
use App\Model\Change;
use App\Calculator\Mk2Calculator;
use PHPUnit\Framework\TestCase;

class Mk2CalculatorTest extends TestCase
{
    /**
     * @var CalculatorInterface
     */
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new Mk2Calculator();
    }

    public function testGetChangeEasy()
    {
        $change = $this->calculator->getChange(2);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertEquals(1, $change->coin2);
    }

    public function testGetChangeHard()
    {
        $change = $this->calculator->getChange(16);
        $this->assertEquals(3, $change->coin2);
        $this->assertEquals(1, $change->bill10);
    }

    public function testGetChangeImpossible()
    {
        $change = $this->calculator->getChange(1);
        $this->assertNull($change);
    }

    public function testGetSupportedModel()
    {
        $this->assertEquals('mk2', $this->calculator->getSupportedModel());
    }
}
