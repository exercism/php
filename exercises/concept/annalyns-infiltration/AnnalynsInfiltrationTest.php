<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class AnnalynsInfiltrationTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'AnnalynsInfiltration.php';
    }

    /**
     * @task_id 1
     */
    #[TestDox('cannot fast attack when the knight is awake')]
    public function testCannotFastAttackWhenKnightIsAwake()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canFastAttack(is_knight_awake: true);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @task_id 1
     */
    #[TestDox('can fast attack when the knight is asleep')]
    public function testCanFastAttackWhenKnightIsAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canFastAttack(is_knight_awake: false);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @task_id 2
     */
    #[TestDox('cannot spy when everyone is asleep')]
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
     * @task_id 2
     */
    #[TestDox('can spy when only the prisoner is awake')]
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
     * @task_id 2
     */
    #[TestDox('can spy when only the archer is awake')]
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
     * @task_id 2
     */
    #[TestDox('can spy when only the knight is awake')]
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
     * @task_id 2
     */
    #[TestDox('can spy when only the knight is asleep')]
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
     * @task_id 2
     */
    #[TestDox('can spy when only the prisoner is asleep')]
    public function testCanSpyWhenOnlyPrisonerAsleep()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: true,
            is_archer_awake: true,
            is_prisoner_awake: false
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @task_id 2
     */
    #[TestDox('can spy when only the archer is asleep')]
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
     * @task_id 2
     */
    #[TestDox('can spy when everyone is awake')]
    public function testCanSpyWhenEveryoneAwake()
    {
        $infiltration = new AnnalynsInfiltration();
        $actual = $infiltration->canSpy(
            is_knight_awake: true,
            is_archer_awake: true,
            is_prisoner_awake: true
        );
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    /**
     * @task_id 3
     */
    #[TestDox('cannot signal the prisoner when everyone is asleep')]
    public function testCannotSignalWhenAllAsleep()
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
     * @task_id 3
     */
    #[TestDox('can signal the prisoner when archer is asleep')]
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
     * @task_id 3
     */
    #[TestDox('cannot signal the prisoner when prisoner is asleep')]
    public function testCannotSignalWhenPrisonerAsleep()
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
     * @task_id 3
     */
    #[TestDox('cannot signal the prisoner when no one is asleep')]
    public function testCannotSignalWhenNoOneAsleep()
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
     * @task_id 4
     */
    #[TestDox('can liberate the prisoner when no one is awake but dog present')]
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
     * @task_id 4
     */
    #[TestDox('can liberate the prisoner when prisoner is awake with dog')]
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when archer is awake with dog')]
    public function testCannotLiberateWhenArcherAwakeWithDog()
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
     * @task_id 4
     */
    #[TestDox('can liberate the prisoner when only knight awake with dog')]
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when prisoner asleep with dog')]
    public function testCannotLiberateWhenPrisonerAsleepWithDog()
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
     * @task_id 4
     */
    #[TestDox('can liberate the prisoner when only archer asleep with dog')]
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when knight asleep with dog')]
    public function testCannotLiberateWhenKnightAsleepWithDog()
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when all awake with dog')]
    public function testCannotLiberateWhenAllAwakeWithDog()
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

    /**
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when no one is awake and no dog present')]
    public function testCannotLiberateWhenAllAsleepAndNoDogPresent()
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
     * @task_id 4
     */
    #[TestDox('can liberate the prisoner when prisoner is awake without dog')]
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when archer is awake without dog')]
    public function testCannotLiberateWhenArcherAwakeWithoutDog()
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when only knight awake without dog')]
    public function testCannotLiberateWhenKnightAwakeWithoutDog()
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when prisoner asleep without dog')]
    public function testCannotLiberateWhenPrisonerAsleepWithoutDog()
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when only archer asleep without dog')]
    public function testCannotLiberateWhenArcherAsleepWithoutDog()
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when knight asleep without dog')]
    public function testCannotLiberateWhenKnightAsleepWithoutDog()
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
     * @task_id 4
     */
    #[TestDox('cannot liberate the prisoner when all awake without dog')]
    public function testCannotLiberateWhenAllAwakeWithoutDog()
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
}
