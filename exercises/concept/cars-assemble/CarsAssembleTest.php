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
    #[TestDox('Success rate for "off" (speed 0)')]
    public function testSuccessRateForSpeedZero()
    {
        $assemblyLine = new CarsAssemble();
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
    #[TestDox('Success rate for speed 8')]
    public function testSuccessRateForSpeedEight()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->successRate(8);
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
    #[TestDox('Production rate per hour for "off" (speed 0)')]
    public function testProductionRatePerHourForSpeedZero()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(0);
        $this->assertEqualsWithDelta(0.0, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 1')]
    public function testProductionRatePerHourForSpeedOne()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(1);
        $this->assertEqualsWithDelta(221.0, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 4')]
    public function testProductionRatePerHourForSpeedFour()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(4);
        $this->assertEqualsWithDelta(884.0, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 6')]
    public function testProductionRatePerHourForSpeedSix()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(6);
        $this->assertEqualsWithDelta(1193.4, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 9')]
    public function testProductionRatePerHourForSpeedNine()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(9);
        $this->assertEqualsWithDelta(1591.2, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 10')]
    public function testProductionRatePerHourForSpeedTen()
    {
        $assembly_line = new CarsAssemble();
        $actual = $assembly_line->productionRatePerHour(10);
        $this->assertEqualsWithDelta(1701.7, $actual, 0.001);
    }

    /**
     * @task_id 3
     */
    #[TestDox('Line is not running when "off" (speed 0)')]
    public function testIsLineRunningForSpeedZero()
    {
        $assembly_line = new CarsAssemble();
        $this->assertFalse($assembly_line->isLineRunning(0));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Line is running at speed 1')]
    public function testIsLineRunningForSpeedOne()
    {
        $assembly_line = new CarsAssemble();
        $this->assertTrue($assembly_line->isLineRunning(1));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Line is running at speed 10')]
    public function testIsLineRunningForSpeedTen()
    {
        $assembly_line = new CarsAssemble();
        $this->assertTrue($assembly_line->isLineRunning(10));
    }

    /**
     * @task_id 4
     */
    #[TestDox('Compare speeds when the first is smaller')]
    public function testCompareSpeedsWhenFirstIsSmaller()
    {
        $assembly_line = new CarsAssemble();
        $this->assertSame(-1, $assembly_line->compareSpeeds(3, 7));
    }

    /**
     * @task_id 4
     */
    #[TestDox('Compare speeds when both are equal')]
    public function testCompareSpeedsWhenEqual()
    {
        $assembly_line = new CarsAssemble();
        $this->assertSame(0, $assembly_line->compareSpeeds(5, 5));
    }

    /**
     * @task_id 4
     */
    #[TestDox('Compare speeds when the first is greater')]
    public function testCompareSpeedsWhenFirstIsGreater()
    {
        $assembly_line = new CarsAssemble();
        $this->assertSame(1, $assembly_line->compareSpeeds(9, 2));
    }
}
