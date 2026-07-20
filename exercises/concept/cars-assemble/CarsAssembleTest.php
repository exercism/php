<?php

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class CarsAssembleTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'CarsAssemble.php';
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 0')]
    public function testSuccessRateForSpeedZero()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->successRate(0);
        $this->assertEqualsWithDelta(0.0, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 1')]
    public function testSuccessRateForSpeedOne()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->successRate(1);
        $this->assertEqualsWithDelta(1.0, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 4')]
    public function testSuccessRateForSpeedFour()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->successRate(4);
        $this->assertEqualsWithDelta(1.0, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 5')]
    public function testSuccessRateForSpeedFive()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->successRate(5);
        $this->assertEqualsWithDelta(0.9, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 9')]
    public function testSuccessRateForSpeedNine()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->successRate(9);
        $this->assertEqualsWithDelta(0.8, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 10')]
    public function testSuccessRateForSpeedTen()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->successRate(10);
        $this->assertEqualsWithDelta(0.77, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 0')]
    public function testProductionRatePerHourForSpeedZero()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(0);
        $this->assertEqualsWithDelta(0.0, $actual, 0.1);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 1')]
    public function testProductionRatePerHourForSpeedOne()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(1);
        $this->assertEqualsWithDelta(221.0, $actual, 0.1);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 4')]
    public function testProductionRatePerHourForSpeedFour()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(4);
        $this->assertEqualsWithDelta(884.0, $actual, 0.1);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 7')]
    public function testProductionRatePerHourForSpeedSeven()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(7);
        $this->assertEqualsWithDelta(1392.3, $actual, 0.1);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 9')]
    public function testProductionRatePerHourForSpeedNine()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(9);
        $this->assertEqualsWithDelta(1591.2, $actual, 0.1);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 10')]
    public function testProductionRatePerHourForSpeedTen()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(10);
        $this->assertEqualsWithDelta(1701.7, $actual, 0.1);
    }

    /**
     * @task_id 3
     */
    #[TestDox('Working items per minute for speed 0')]
    public function testWorkingItemsPerMinuteForSpeedZero()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->workingItemsPerMinute(0);
        $this->assertSame(0, $actual);
    }

    /**
     * @task_id 3
     */
    #[TestDox('Working items per minute for speed 1')]
    public function testWorkingItemsPerMinuteForSpeedOne()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->workingItemsPerMinute(1);
        $this->assertSame(3, $actual);
    }

    /**
     * @task_id 3
     */
    #[TestDox('Working items per minute for speed 5')]
    public function testWorkingItemsPerMinuteForSpeedFive()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->workingItemsPerMinute(5);
        $this->assertSame(16, $actual);
    }

    /**
     * @task_id 3
     */
    #[TestDox('Working items per minute for speed 8')]
    public function testWorkingItemsPerMinuteForSpeedEight()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->workingItemsPerMinute(8);
        $this->assertSame(26, $actual);
    }

    /**
     * @task_id 3
     */
    #[TestDox('Working items per minute for speed 9')]
    public function testWorkingItemsPerMinuteForSpeedNine()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->workingItemsPerMinute(9);
        $this->assertSame(26, $actual);
    }

    /**
     * @task_id 3
     */
    #[TestDox('Working items per minute for speed 10')]
    public function testWorkingItemsPerMinuteForSpeedTen()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->workingItemsPerMinute(10);
        $this->assertSame(28, $actual);
    }
}
