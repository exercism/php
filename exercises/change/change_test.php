<?php

require "change.php";

class ChangeTest extends PHPUnit_Framework_TestCase
{
    public function testSingleCoinChange()
    {
        $this->assertEquals(array(25), findFewestCoins(array(1, 5, 10, 25, 100), 25));
    }

    public function testChange()
    {
        $this->markTestSkipped();
        $this->assertEquals(array(5, 10), findFewestCoins(array(1, 5, 10, 25, 100), 15));
    }

    public function testChangeWithLilliputianCoins()
    {
        $this->markTestSkipped();
        $this->assertEquals(array(4, 4, 15), findFewestCoins(array(1, 4, 15, 20, 50), 23));
    }

    public function testChangeWithLowerElboniaCoins()
    {
        $this->markTestSkipped();
        $this->assertEquals(array(21, 21, 21), findFewestCoins(array(1, 5, 10, 21, 25), 63));
    }

    public function testWithLargeTargetValue()
    {
        $this->markTestSkipped();
        $this->assertEquals(
            array(2, 2, 5, 20, 20, 50, 100, 100, 100, 100, 100, 100, 100, 100, 100),
            findFewestCoins(array(1, 2, 5, 10, 20, 50, 100), 999)
        );
    }

    public function testForChangeSmallerThanAvailableCoins()
    {
        $this->markTestSkipped();
        $this->setExpectedException('InvalidArgumentException', 'No coins small enough to make change');
        findFewestCoins(array(5, 10), 3);
    }

    public function testNoCoinsForZero()
    {
        $this->markTestSkipped();
        $this->assertEquals(array(), findFewestCoins(array(1, 2, 5), 0));
    }

    public function testChangeValueLessThanZero()
    {
        $this->markTestSkipped();
        $this->setExpectedException('InvalidArgumentException', 'Cannot make change for negative value');
        findFewestCoins(array(1, 2, 5), -5);
    }
}
