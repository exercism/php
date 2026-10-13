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
        $actual = $assemblyLine->successRate(0);
        $this->assertEqualsWithDelta(0.0, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 1')]
    public function testSuccessRateForSpeedOne()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->successRate(1);
        $this->assertEqualsWithDelta(1.0, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 4')]
    public function testSuccessRateForSpeedFour()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->successRate(4);
        $this->assertEqualsWithDelta(1.0, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 5')]
    public function testSuccessRateForSpeedFive()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->successRate(5);
        $this->assertEqualsWithDelta(0.9, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 8')]
    public function testSuccessRateForSpeedEight()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->successRate(8);
        $this->assertEqualsWithDelta(0.9, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 9')]
    public function testSuccessRateForSpeedNine()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->successRate(9);
        $this->assertEqualsWithDelta(0.8, $actual, 0.001);
    }

    /**
     * @task_id 1
     */
    #[TestDox('Success rate for speed 10')]
    public function testSuccessRateForSpeedTen()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->successRate(10);
        $this->assertEqualsWithDelta(0.77, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for "off" (speed 0)')]
    public function testProductionRatePerHourForSpeedZero()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->productionRatePerHour(0);
        $this->assertEqualsWithDelta(0.0, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 1')]
    public function testProductionRatePerHourForSpeedOne()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->productionRatePerHour(1);
        $this->assertEqualsWithDelta(221.0, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 4')]
    public function testProductionRatePerHourForSpeedFour()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->productionRatePerHour(4);
        $this->assertEqualsWithDelta(884.0, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 6')]
    public function testProductionRatePerHourForSpeedSix()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->productionRatePerHour(6);
        $this->assertEqualsWithDelta(1193.4, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 9')]
    public function testProductionRatePerHourForSpeedNine()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->productionRatePerHour(9);
        $this->assertEqualsWithDelta(1591.2, $actual, 0.001);
    }

    /**
     * @task_id 2
     */
    #[TestDox('Production rate per hour for speed 10')]
    public function testProductionRatePerHourForSpeedTen()
    {
        $assemblyLine = new CarsAssemble();
        $actual = $assemblyLine->productionRatePerHour(10);
        $this->assertEqualsWithDelta(1701.7, $actual, 0.001);
    }

    /**
     * @task_id 3
     */
    #[TestDox('Line is not running when "off" (speed 0)')]
    public function testIsLineRunningForSpeedZero()
    {
        $assemblyLine = new CarsAssemble();
        $this->assertFalse($assemblyLine->isLineRunning(0));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Line is running at speed 1')]
    public function testIsLineRunningForSpeedOne()
    {
        $assemblyLine = new CarsAssemble();
        $this->assertTrue($assemblyLine->isLineRunning(1));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Line is running at speed 10')]
    public function testIsLineRunningForSpeedTen()
    {
        $assemblyLine = new CarsAssemble();
        $this->assertTrue($assemblyLine->isLineRunning(10));
    }

    /**
     * @task_id 4
     */
    #[TestDox('Compare speeds when the first is smaller')]
    public function testCompareSpeedsWhenFirstIsSmaller()
    {
        $assemblyLine = new CarsAssemble();
        $this->assertSame(-1, $assemblyLine->compareSpeeds(3, 7));
    }

    /**
     * @task_id 4
     */
    #[TestDox('Compare speeds when both are equal')]
    public function testCompareSpeedsWhenEqual()
    {
        $assemblyLine = new CarsAssemble();
        $this->assertSame(0, $assemblyLine->compareSpeeds(5, 5));
    }

    /**
     * @task_id 4
     */
    #[TestDox('Compare speeds when the first is greater')]
    public function testCompareSpeedsWhenFirstIsGreater()
    {
        $assemblyLine = new CarsAssemble();
        $this->assertSame(1, $assemblyLine->compareSpeeds(9, 2));
    }
}
