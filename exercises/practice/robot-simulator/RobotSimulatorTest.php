<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class RobotSimulatorTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RobotSimulator.php';
    }

    /**
     * A robot is created with a position and a direction
     */
    public function testCreate(): void
    {
        // Robots are created with a position and direction
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);

        // Negative positions are allowed
        $robot = new Robot([-1, -1], Robot::DIRECTION_SOUTH);
        $this->assertEquals([-1, -1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);
    }

    /**
     * Rotate the robot's direction 90 degrees clockwise
     */
    public function testTurnRight(): void
    {
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);

        // Change the direction from north to east
        $robot->turnRight();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_EAST, $robot->direction);

        // Change the direction from east to south
        $robot->turnRight();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);

        // Change the direction from south to west
        $robot->turnRight();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);

        // Change the direction from west to north
        $robot->turnRight();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);
    }

    /**
     * Rotate the robot's direction 90 degrees counterclockwise
     */
    public function testTurnLeft(): void
    {
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);

        // Change the direction from north to west
        $robot->turnLeft();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);

        // Change the direction from west to south
        $robot->turnLeft();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);

        // Change the direction from south to east
        $robot->turnLeft();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_EAST, $robot->direction);

        // Change the direction from east to north
        $robot->turnLeft();
        $this->assertEquals([0, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);
    }

    /**
     * Move the robot forward 1 space in the direction it is pointing
     */
    public function testAdvance(): void
    {
        // Increases the y coordinate by one when facing north
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $robot->advance();
        $this->assertEquals([0, 1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);

        // Decreases the y coordinate by one when facing south
        $robot = new Robot([0, 0], Robot::DIRECTION_SOUTH);
        $robot->advance();
        $this->assertEquals([0, -1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);

        // Increases the x coordinate by one when facing east
        $robot = new Robot([0, 0], Robot::DIRECTION_EAST);
        $robot->advance();
        $this->assertEquals([1, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_EAST, $robot->direction);

        // Decreases the x coordinate by one when facing west
        $robot = new Robot([0, 0], Robot::DIRECTION_WEST);
        $robot->advance();
        $this->assertEquals([-1, 0], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);
    }

    /**
     * Where R = Turn Right, L = Turn Left and A = Advance,
     * the robot can follow a series of instructions
     * and end up with the correct position and direction
     */
    public function testInstructions(): void
    {
        // Instructions to move west and north
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $robot->instructions('LAAARALA');
        $this->assertEquals([-4, 1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);

        // Instructions to move west and south
        $robot = new Robot([2, -7], Robot::DIRECTION_EAST);
        $robot->instructions('RRAAAAALA');
        $this->assertEquals([-3, -8], $robot->position);
        $this->assertEquals(Robot::DIRECTION_SOUTH, $robot->direction);

        // Instructions to move east and north
        $robot = new Robot([8, 4], Robot::DIRECTION_SOUTH);
        $robot->instructions('LAAARRRALLLL');
        $this->assertEquals([11, 5], $robot->position);
        $this->assertEquals(Robot::DIRECTION_NORTH, $robot->direction);
    }

    public function testMalformedInstructions(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $robot->instructions('LARX');
    }

    /**
     * Optional instructions chaining
     */
    public function testInstructionsChaining(): void
    {
        $robot = new Robot([0, 0], Robot::DIRECTION_NORTH);
        $robot->turnLeft()
            ->advance()
            ->advance()
            ->advance()
            ->turnRight()
            ->advance()
            ->turnLeft()
            ->advance();
        $this->assertEquals([-4, 1], $robot->position);
        $this->assertEquals(Robot::DIRECTION_WEST, $robot->direction);
    }
}
