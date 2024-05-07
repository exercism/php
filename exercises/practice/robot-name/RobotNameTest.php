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

class RobotNameTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RobotName.php';
    }

    /** @var Robot $robot */
    protected $robot = null;

    public function setUp(): void
    {
        $this->robot = new Robot();
    }

    public function testHasName(): void
    {
        $this->assertMatchesRegularExpression('/^[a-z]{2}\d{3}$/i', $this->robot->getName());
    }

    public function testNameSticks(): void
    {
        $old = $this->robot->getName();

        $this->assertSame($this->robot->getName(), $old);
    }

    public function testDifferentRobotsHaveDifferentNames(): void
    {
        $other_bot = new Robot();

        $this->assertNotSame($other_bot->getName(), $this->robot->getName());

        unset($other_bot);
    }

    public function testResetName(): void
    {
        $name1 = $this->robot->getName();

        $this->robot->reset();

        $name2 = $this->robot->getName();

        $this->assertNotSame($name1, $name2);

        $this->assertMatchesRegularExpression('/\w{2}\d{3}/', $name2);
    }

    /**
     * PHPUnit ^10.5 has an issue with
     *   $this->assertArrayNotHasKey($name, $names, sprintf...
     * that leads to test timeouts. This is fixed in PHPUnit ^11.
     * Revert workaround
     *   $this->assertFalse(isset($names[$name]), sprintf...
     * when upgrading.
     */
    public function testNameArentRecycled(): void
    {
        $names = [];

        for ($i = 0; $i < 10000; $i++) {
            $name = $this->robot->getName();
            $this->assertFalse(isset($names[$name]), sprintf('Name %s reissued after Reset.', $name));
            $names[$name] = true;
            $this->robot->reset();
        }
    }

    /**
     * PHPUnit ^10.5 has an issue with
     *   $this->assertArrayNotHasKey($name, $names, sprintf...
     * that leads to test timeouts. This is fixed in PHPUnit ^11.
     * Revert workaround
     *   $this->assertFalse(isset($names[$name]), sprintf...
     * when upgrading.
     */
    // This test is optional.
    public function testNameUniquenessManyRobots(): void
    {
        $names = [];

        for ($i = 0; $i < 10000; $i++) {
            $name = (new Robot())->getName();
            $this->assertFalse(isset($names[$name]), sprintf('Name %s reissued after %d robots', $name, $i));
            $names[$name] = true;
        }
    }
}
