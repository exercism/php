<?php

class PizzaPiTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PizzaPi.php';
    }

    /**
     * @testdox determine how much dough is required
     * @task_id 1
     */
    public function testCalculateDoughRequirement()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateDoughRequirement(5, 7);
        $expected = 1700;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox determine how many cans of sauce are required
     * @task_id 2
     */
    public function testCalculateSauceRequirement()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateSauceRequirement(8, 250);
        $expected = 4;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox determine how many pizzas a cube of cheese can cover
     * @task_id 3
     */
    public function testCalculateCheeseCoverage()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateCheeseCubeCoverage(25, 0.5, 30);
        $expected = 331;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox determine number of pieces remaining when evenly dividing
     * @task_id 4
     */
    public function testCalculateLeftOverSlicesWithoutLeftOver()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateLeftOverSlices(2, 4);
        $expected = 0;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox determine number of pieces remaining when not evenly dividing
     * @task_id 4
     */
    public function testCalculateLeftOverSlicesWithLeftOver()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateLeftOverSlices(4, 3);
        $expected = 2;
        $this->assertEquals($expected, $actual);
    }
}
