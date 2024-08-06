<?php

declare(strict_types=1);

class RobotSimulatorTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RobotSimulator.php';
    }

    /**
     * uuid: c557c16d-26c1-4e06-827c-f6602cd0785c
     * @testdox Create robot - at origin facing north
     */
    public function testCreateRobotAtOriginFacingNorth(): void
    {
        $robot = new RobotSimulator([0, 0], 'north');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('north', $robot->getDirection());
    }

    /**
     * uuid: bf0dffce-f11c-4cdb-8a5e-2c89d8a5a67d
     * @testdox Create robot - at negative position facing south
     */
    public function testCreateRobotAtNegativePositionFacingSouth(): void
    {
        $robot = new RobotSimulator([-1, -1], 'south');
        $this->assertEquals([-1, -1], $robot->getPosition());
        $this->assertEquals('south', $robot->getDirection());
    }

    /**
     * uuid: 8cbd0086-6392-4680-b9b9-73cf491e67e5
     * @testdox Rotating clockwise - changes north to east
     */
    public function testRotatingClockwiseChangesNorthToEast(): void
    {
        $robot = new RobotSimulator([0, 0], 'north');
        $robot->instructions('R');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('east', $robot->getDirection());
    }

    /**
     * uuid: 8abc87fc-eab2-4276-93b7-9c009e866ba1
     * @testdox Rotating clockwise - changes east to south
     */
    public function testRotatingClockwiseChangesEastToSouth(): void
    {
        $robot = new RobotSimulator([0, 0], 'east');
        $robot->instructions('R');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('south', $robot->getDirection());
    }

    /**
     * uuid: 3cfe1b85-bbf2-4bae-b54d-d73e7e93617a
     * @testdox Rotating clockwise - changes south to west
     */
    public function testRotatingClockwiseChangesSouthToWest(): void
    {
        $robot = new RobotSimulator([0, 0], 'south');
        $robot->instructions('R');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('west', $robot->getDirection());
    }

    /**
     * uuid: 5ea9fb99-3f2c-47bd-86f7-46b7d8c3c716
     * @testdox Rotating clockwise - changes west to north
     */
    public function testRotatingClockwiseChangesWestToNorth(): void
    {
        $robot = new RobotSimulator([0, 0], 'west');
        $robot->instructions('R');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('north', $robot->getDirection());
    }

    /**
     * uuid: fa0c40f5-6ba3-443d-a4b3-58cbd6cb8d63
     * @testdox Rotating counter-clockwise - changes north to west
     */
    public function testRotatingCounterClockwiseChangesNorthToWest(): void
    {
        $robot = new RobotSimulator([0, 0], 'north');
        $robot->instructions('L');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('west', $robot->getDirection());
    }

    /**
     * uuid: da33d734-831f-445c-9907-d66d7d2a92e2
     * @testdox Rotating counter-clockwise - changes west to south
     */
    public function testRotatingCounterClockwiseChangesWestToSouth(): void
    {
        $robot = new RobotSimulator([0, 0], 'west');
        $robot->instructions('L');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('south', $robot->getDirection());
    }

    /**
     * uuid: bd1ca4b9-4548-45f4-b32e-900fc7c19389
     * @testdox Rotating counter-clockwise - changes south to east
     */
    public function testRotatingCounterClockwiseChangesSouthToEast(): void
    {
        $robot = new RobotSimulator([0, 0], 'south');
        $robot->instructions('L');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('east', $robot->getDirection());
    }

    /**
     * uuid: 2de27b67-a25c-4b59-9883-bc03b1b55bba
     * @testdox Rotating counter-clockwise - changes east to north
     */
    public function testRotatingCounterClockwiseChangesEastToNorth(): void
    {
        $robot = new RobotSimulator([0, 0], 'east');
        $robot->instructions('L');
        $this->assertEquals([0, 0], $robot->getPosition());
        $this->assertEquals('north', $robot->getDirection());
    }

    /**
     * uuid: f0dc2388-cddc-4f83-9bed-bcf46b8fc7b8
     * @testdox Moving forward one - facing north increments Y
     */
    public function testMovingForwardOneFacingNorthIncrementsY(): void
    {
        $robot = new RobotSimulator([0, 0], 'north');
        $robot->instructions('A');
        $this->assertEquals([0, 1], $robot->getPosition());
        $this->assertEquals('north', $robot->getDirection());
    }

    /**
     * uuid: 2786cf80-5bbf-44b0-9503-a89a9c5789da
     * @testdox Moving forward one - facing south decrements Y
     */
    public function testMovingForwardOneFacingSouthDecrementsY(): void
    {
        $robot = new RobotSimulator([0, 0], 'south');
        $robot->instructions('A');
        $this->assertEquals([0, -1], $robot->getPosition());
        $this->assertEquals('south', $robot->getDirection());
    }

    /**
     * uuid: 84bf3c8c-241f-434d-883d-69817dbd6a48
     * @testdox Moving forward one - facing east increments X
     */
    public function testMovingForwardOneFacingEastIncrementsX(): void
    {
        $robot = new RobotSimulator([0, 0], 'east');
        $robot->instructions('A');
        $this->assertEquals([1, 0], $robot->getPosition());
        $this->assertEquals('east', $robot->getDirection());
    }

    /**
     * uuid: bb69c4a7-3bbf-4f64-b415-666fa72d7b04
     * @testdox Moving forward one - facing west decrements X
     */
    public function testMovingForwardOneFacingWestDecrementsX(): void
    {
        $robot = new RobotSimulator([0, 0], 'west');
        $robot->instructions('A');
        $this->assertEquals([-1, 0], $robot->getPosition());
        $this->assertEquals('west', $robot->getDirection());
    }

    /**
     * uuid: e34ac672-4ed4-4be3-a0b8-d9af259cbaa1
     * @testdox Follow series of instructions - moving east and north from instructions
     */
    public function testFollowSeriesOfInstructionsMovingEastAndNorthFromInstructions(): void
    {
        $robot = new RobotSimulator([7, 3], 'north');
        $robot->instructions('RAALAL');
        $this->assertEquals([9, 4], $robot->getPosition());
        $this->assertEquals('west', $robot->getDirection());
    }

    /**
     * uuid: f30e4955-4b47-4aa3-8b39-ae98cfbd515b
     * @testdox Follow series of instructions - moving west and north
     */
    public function testFollowSeriesOfInstructionsMovingWestAndNorth(): void
    {
        $robot = new RobotSimulator([0, 0], 'north');
        $robot->instructions('LAAARALA');
        $this->assertEquals([-4, 1], $robot->getPosition());
        $this->assertEquals('west', $robot->getDirection());
    }

    /**
     * uuid: 3e466bf6-20ab-4d79-8b51-264165182fca
     * @testdox Follow series of instructions - moving west and south
     */
    public function testFollowSeriesOfInstructionsMovingWestAndSouth(): void
    {
        // Instructions to move west and south
        $robot = new RobotSimulator([2, -7], 'east');
        $robot->instructions('RRAAAAALA');
        $this->assertEquals([-3, -8], $robot->getPosition());
        $this->assertEquals('south', $robot->getDirection());
    }

    /**
     * uuid: 41f0bb96-c617-4e6b-acff-a4b279d44514
     * @testdox Follow series of instructions - moving east and north
     */
    public function testFollowSeriesOfInstructionsMovingEastAndNorth(): void
    {
        // Instructions to move east and north
        $robot = new RobotSimulator([8, 4], 'south');
        $robot->instructions('LAAARRRALLLL');
        $this->assertEquals([11, 5], $robot->getPosition());
        $this->assertEquals('north', $robot->getDirection());
    }
}
