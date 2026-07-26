<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class RobotNameTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RobotName.php';
    }

    #[TestDox('Has name')]
    public function testHasName(): void
    {
        $robot = new Robot();
        $this->assertMatchesRegularExpression('/^[a-z]{2}\d{3}$/i', $robot->getName());
    }

    #[TestDox('Name sticks')]
    public function testNameSticks(): void
    {
        $robot = new Robot();
        $old = $robot->getName();

        $this->assertSame($robot->getName(), $old);
    }

    #[TestDox('Different robots have different names')]
    public function testDifferentRobotsHaveDifferentNames(): void
    {
        $robot = new Robot();
        $other_bot = new Robot();

        $this->assertNotSame($other_bot->getName(), $robot->getName());

        unset($other_bot);
    }

    #[TestDox('Reset name')]
    public function testResetName(): void
    {
        $robot = new Robot();
        $name1 = $robot->getName();

        $robot->reset();

        $name2 = $robot->getName();

        $this->assertNotSame($name1, $name2);

        $this->assertMatchesRegularExpression('/\w{2}\d{3}/', $name2);
    }

    #[TestDox("Names aren't recycled")]
    public function testNamesArentRecycled(): void
    {
        $robot = new Robot();
        $names = [];

        for ($i = 0; $i < 10000; $i++) {
            $name = $robot->getName();
            $this->assertArrayNotHasKey($name, $names, sprintf('Name %s reissued after Reset.', $name));
            $names[$name] = true;
            $robot->reset();
        }
    }

    // This test is optional.
    #[TestDox('Name uniqueness many robots')]
    public function testNameUniquenessManyRobots(): void
    {
        $robot = new Robot();
        $names = [];

        for ($i = 0; $i < 10000; $i++) {
            $name = (new Robot())->getName();
            $this->assertArrayNotHasKey($name, $names, sprintf('Name %s reissued after %d robots', $name, $i));
            $names[$name] = true;
        }
    }
}
