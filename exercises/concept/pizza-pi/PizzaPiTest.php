<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class PizzaPiTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PizzaPi.php';
    }

    /**
     * @task_id 1
     */
    #[TestDox('determine how much dough is required')]
    public function testCalculateDoughRequirement()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateDoughRequirement(5, 7);
        $expected = 1700;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @task_id 2
     */
    #[TestDox('determine how many cans of sauce are required')]
    public function testCalculateSauceRequirement()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateSauceRequirement(8, 250);
        $expected = 4;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @task_id 3
     */
    #[TestDox('determine how many pizzas a cube of cheese can cover')]
    public function testCalculateCheeseCoverage()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateCheeseCubeCoverage(25, 0.5, 30);
        $expected = 331;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @task_id 4
     */
    #[TestDox('determine number of pieces remaining when evenly dividing')]
    public function testCalculateLeftOverSlicesWithoutLeftOver()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateLeftOverSlices(2, 4);
        $expected = 0;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @task_id 4
     */
    #[TestDox('determine number of pieces remaining when not evenly dividing')]
    public function testCalculateLeftOverSlicesWithLeftOver()
    {
        $pizza_pi = new PizzaPi();
        $actual = $pizza_pi->calculateLeftOverSlices(4, 3);
        $expected = 2;
        $this->assertEquals($expected, $actual);
    }
}
