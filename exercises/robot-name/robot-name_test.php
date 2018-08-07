<?php

require_once "robot-name.php";

class RobotTest extends PHPUnit\Framework\TestCase
{
    /** @var Robot $robot */
    protected $robot = null;

    public function setUp()
    {
        $this->robot = new Robot();
    }

    public function testHasName()
    {
        $this->assertRegExp('/^[a-z]{2}\d{3}$/i', $this->robot->getName());
    }

    public function testNameSticks()
    {
        $old = $this->robot->getName();

        $this->assertSame($this->robot->getName(), $old);
    }

    public function testDifferentRobotsHaveDifferentNames()
    {
        $other_bot = new Robot();

        $this->assertNotSame($other_bot->getName(), $this->robot->getName());

        unset($other_bot);
    }

    public function testresetName()
    {
        $name1 = $this->robot->getName();

        $this->robot->reset();

        $name2 = $this->robot->getName();

        $this->assertNotSame($name1, $name2);

        $this->assertRegExp('/\w{2}\d{3}/', $name2);
    }
  
    public function testNameArentRecycled()
    {
        $names = [];

        for ($i = 0; $i < 10000; $i++) {
            $name = $this->robot->getName();
            $this->assertArrayNotHasKey($name, $names, sprintf('Name %s reissued after Reset.', $name));
            $names[$name] = true;
            $this->robot->reset();
        }
    }

    // This test is optional.
    public function testNameUniquenessManyRobots()
    {
        $names = [];

        for ($i = 0; $i < 10000; $i++) {
            $name = (new Robot())->getName();
            $this->assertArrayNotHasKey($name, $names, sprintf('Name %s reissued after %d robots', $name, $i));
            $names[$name] = true;
        }
    }
}
