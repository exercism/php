<?php

class AnnalynsInfiltrationTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'AnnalynsInfiltration.php';
    }

    /**
     * @testdox cannot fast attack when the knight is awake
     * @task_id 1
     */
    public function testCanFastAttackWhenKnightIsAwake()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canFastAttack(is_knight_awake: true);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can fast attack when the knight is asleep
     * @task_id 1
     */
    public function testCanFastAttackWhenKnightIsAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canFastAttack(is_knight_awake: false);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox cannot spy when everyone is asleep
     * @task_id 2
     */
    public function testCannotSpyWhenEveryoneAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: false,
            is_archer_awake: false,
            is_prisoner_awake: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can spy when only the prisoner is awake
     * @task_id 2
     */
    public function testCanSpyWhenOnlyPrisonerAwake()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: false,
            is_archer_awake: false,
            is_prisoner_awake: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can spy when only the archer is awake
     * @task_id 2
     */
    public function testCanSpyWhenOnlyArcherAwake()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: false,
            is_archer_awake: true,
            is_prisoner_awake: false
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can spy when only the knight is asleep
     * @task_id 2
     */
    public function testCanSpyWhenOnlyKnightAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: false,
            is_archer_awake: true,
            is_prisoner_awake: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can spy when only the knight is awake
     * @task_id 2
     */
    public function testCanSpyWhenOnlyKnightAwake()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: true,
            is_archer_awake: false,
            is_prisoner_awake: false
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can spy when only the archer is asleep
     * @task_id 2
     */
    public function testCanSpyWhenOnlyArcherAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: true,
            is_archer_awake: false,
            is_prisoner_awake: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can spy when everyone is awake
     * @task_id 2
     */
    public function testCanSpyWhenEveryoneAwake()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: true,
            is_archer_awake: false,
            is_prisoner_awake: false
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can signal the prisoner when everyone is asleep
     * @task_id 3
     */
    public function testCanSignalWhenAllAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSignal(
            is_archer_awake: false,
            is_prisoner_awake: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can signal the prisoner when archer is asleep
     * @task_id 3
     */
    public function testCanSignalWhenArcherAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSignal(
            is_archer_awake: false,
            is_prisoner_awake: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can signal the prisoner when prisoner is asleep
     * @task_id 3
     */
    public function testCanSignalWhenPrisonerAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSignal(
            is_archer_awake: true,
            is_prisoner_awake: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can signal the prisoner when no one is asleep
     * @task_id 3
     */
    public function testCanSignalWhenNoOneAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSignal(
            is_archer_awake: true,
            is_prisoner_awake: true
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox cannot liberate the prisoner when no one is awake
     * @task_id 4
     */
    public function testCanLiberateWhenAllAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: false,
            is_archer_awake: false,
            is_prisoner_awake: false,
            is_dog_present: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can liberate the prisoner when no one is awake but dog present
     * @task_id 4
     */
    public function testCanLiberateWhenAllAsleepAndDogPresent()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: false,
            is_archer_awake: false,
            is_prisoner_awake: false,
            is_dog_present: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can liberate the prisoner when prisoner is awake without dog
     * @task_id 4
     */
    public function testCanLiberateWhenPrisonerAwakeWithoutDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: false,
            is_archer_awake: false,
            is_prisoner_awake: true,
            is_dog_present: false
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can liberate the prisoner when prisoner is awake with dog
     * @task_id 4
     */
    public function testCanLiberateWhenPrisonerAwakeWithDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: false,
            is_archer_awake: false,
            is_prisoner_awake: true,
            is_dog_present: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox cannot liberate the prisoner when archer is awake without dog
     * @task_id 4
     */
    public function testCanLiberateWhenArcherAwakeWithoutDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: false,
            is_archer_awake: true,
            is_prisoner_awake: false,
            is_dog_present: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox cannot liberate the prisoner when archer is awake with dog
     * @task_id 4
     */
    public function testCanLiberateWhenArcherAwakeWithDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: false,
            is_archer_awake: true,
            is_prisoner_awake: false,
            is_dog_present: true
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox cannot liberate the prisoner when knight asleep with dog
     * @task_id 4
     */
    public function testCanLiberateWhenKnightAsleepWithDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: false,
            is_archer_awake: true,
            is_prisoner_awake: true,
            is_dog_present: true
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox cannot liberate the prisoner when knight asleep without dog
     * @task_id 4
     */
    public function testCanLiberateWhenKnightAsleepWithoutDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: false,
            is_archer_awake: true,
            is_prisoner_awake: true,
            is_dog_present: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox cannot liberate the prisoner when only knight awake without dog
     * @task_id 4
     */
    public function testCanLiberateWhenKnightAwakeWithoutDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: true,
            is_archer_awake: false,
            is_prisoner_awake: false,
            is_dog_present: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox cannot liberate the prisoner when only knight awake with dog
     * @task_id 4
     */
    public function testCanLiberateWhenKnightAwakeWithDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: true,
            is_archer_awake: false,
            is_prisoner_awake: false,
            is_dog_present: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can't liberate the prisoner when only archer asleep without dog
     * @task_id 4
     */
    public function testCanLiberateWhenArcherAsleepWithoutDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: true,
            is_archer_awake: false,
            is_prisoner_awake: true,
            is_dog_present:false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can liberate the prisoner when only archer asleep with dog
     * @task_id 4
     */
    public function testCanLiberateWhenArcherAsleepWithDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: true,
            is_archer_awake: false,
            is_prisoner_awake: true,
            is_dog_present: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can't liberate the prisoner when prisoner asleep without dog
     * @task_id 4
     */
    public function testCanLiberateWhenPrisonerAsleepWithoutDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: true,
            is_archer_awake: true,
            is_prisoner_awake: false,
            is_dog_present: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can't liberate the prisoner when prisoner asleep with dog
     * @task_id 4
     */
    public function testCanLiberateWhenPrisonerAsleepWithDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: true,
            is_archer_awake: true,
            is_prisoner_awake: false,
            is_dog_present: true
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can't liberate the prisoner when all awake without dog
     * @task_id 4
     */
    public function testCanLiberateWhenAllAwakeWithoutDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: true,
            is_archer_awake: true,
            is_prisoner_awake: true,
            is_dog_present: false
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @testdox can't liberate the prisoner when all awake with dog
     * @task_id 4
     */
    public function testCanLiberateWhenAllAwakeWithDog()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canLiberate(
            is_knight_awake: true,
            is_archer_awake: true,
            is_prisoner_awake: true,
            is_dog_present: true
        );
        $expected = false;
        $this->assertEquals($expected, $actual);
    }
}
