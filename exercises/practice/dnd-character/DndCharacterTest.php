<?php

declare(strict_types=1);

class DndCharacterTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'DndCharacter.php';
    }

    /**
     * uuid 1e9ae1dc-35bd-43ba-aa08-e4b94c20fa37
     * @testdox Ability modifier - ability modifier for score 3 is -4
     */
    public function testAbilityModifierFor3IsNegative4()
    {
        $this->assertEquals(-4, DndCharacter::modifier(3));
    }

    /**
     * uuid cc9bb24e-56b8-4e9e-989d-a0d1a29ebb9c
     * @testdox Ability modifier - ability modifier for score 4 is -3
     */
    public function testAbilityModifierFor4IsNegative3()
    {
        $this->assertEquals(-3, DndCharacter::modifier(4));
    }

    /**
     * uuid 5b519fcd-6946-41ee-91fe-34b4f9808326
     * @testdox Ability modifier - ability modifier for score 5 is -3
     */
    public function testAbilityModifierFor5IsNegative3()
    {
        $this->assertEquals(-3, DndCharacter::modifier(5));
    }

    /**
     * uuid dc2913bd-6d7a-402e-b1e2-6d568b1cbe21
     * @testdox Ability modifier - ability modifier for score 6 is -2
     */
    public function testAbilityModifierFor6IsNegative2()
    {
        $this->assertEquals(-2, DndCharacter::modifier(6));
    }

    /**
     * uuid 099440f5-0d66-4b1a-8a10-8f3a03cc499f
     * @testdox Ability modifier - ability modifier for score 7 is -2
     */
    public function testAbilityModifierFor7IsNegative2()
    {
        $this->assertEquals(-2, DndCharacter::modifier(7));
    }

    /**
     * uuid cfda6e5c-3489-42f0-b22b-4acb47084df0
     * @testdox Ability modifier - ability modifier for score 8 is -1
     */
    public function testAbilityModifierFor8IsNegative1()
    {
        $this->assertEquals(-1, DndCharacter::modifier(8));
    }

    /**
     * uuid c70f0507-fa7e-4228-8463-858bfbba1754
     * @testdox Ability modifier - ability modifier for score 9 is -1
     */
    public function testAbilityModifierFor9IsNegative1()
    {
        $this->assertEquals(-1, DndCharacter::modifier(9));
    }

    /**
     * uuid 6f4e6c88-1cd9-46a0-92b8-db4a99b372f7
     * @testdox Ability modifier - ability modifier for score 10 is 0
     */
    public function testAbilityModifierFor10Is0()
    {
        $this->assertEquals(0, DndCharacter::modifier(10));
    }

    /**
     * uuid e00d9e5c-63c8-413f-879d-cd9be9697097
     * @testdox Ability modifier - ability modifier for score 11 is 0
     */
    public function testAbilityModifierFor11Is0()
    {
        $this->assertEquals(0, DndCharacter::modifier(11));
    }

    /**
     * uuid eea06f3c-8de0-45e7-9d9d-b8cab4179715
     * @testdox Ability modifier - ability modifier for score 12 is +1
     */
    public function testAbilityModifierFor12Is1()
    {
        $this->assertEquals(1, DndCharacter::modifier(12));
    }

    /**
     * uuid 9c51f6be-db72-4af7-92ac-b293a02c0dcd
     * @testdox Ability modifier - ability modifier for score 13 is +1
     */
    public function testAbilityModifierFor13Is1()
    {
        $this->assertEquals(1, DndCharacter::modifier(13));
    }

    /**
     * uuid 94053a5d-53b6-4efc-b669-a8b5098f7762
     * @testdox Ability modifier - ability modifier for score 14 is +2
     */
    public function testAbilityModifierFor14Is2()
    {
        $this->assertEquals(2, DndCharacter::modifier(14));
    }

    /**
     * uuid 8c33e7ca-3f9f-4820-8ab3-65f2c9e2f0e2
     * @testdox Ability modifier - ability modifier for score 15 is +2
     */
    public function testAbilityModifierFor15Is2()
    {
        $this->assertEquals(2, DndCharacter::modifier(15));
    }

    /**
     * uuid c3ec871e-1791-44d0-b3cc-77e5fb4cd33d
     * @testdox Ability modifier - ability modifier for score 16 is +3
     */
    public function testAbilityModifierFor16Is3()
    {
        $this->assertEquals(3, DndCharacter::modifier(16));
    }

    /**
     * uuid 3d053cee-2888-4616-b9fd-602a3b1efff4
     * @testdox Ability modifier - ability modifier for score 17 is +3
     */
    public function testAbilityModifierFor17Is3()
    {
        $this->assertEquals(3, DndCharacter::modifier(17));
    }

    /**
     * uuid bafd997a-e852-4e56-9f65-14b60261faee
     * @testdox Ability modifier - ability modifier for score 18 is +4
     */
    public function testAbilityModifierFor18is4()
    {
        $this->assertEquals(4, DndCharacter::modifier(18));
    }

    /**
     * uuid 4f28f19c-2e47-4453-a46a-c0d365259c14
     * @testdox Random ability is within range
     */
    public function testRandomAbilityIsInRange()
    {
        for ($i = 0; $i < 10; $i++) {
            $ability = DndCharacter::ability();
            $this->assertInRange($ability, 3, 18);
        }
    }

    /**
     * uuid 385d7e72-864f-4e88-8279-81a7d75b04ad
     * @testdox Random character is valid
     */
    public function testRandomCharacterIsValid()
    {
        for ($i = 0; $i < 10; $i++) {
            $character = DndCharacter::generate();
            $this->assertInRange($character->strength, 3, 18, 'strength');
            $this->assertInRange($character->dexterity, 3, 18, 'dexterity');
            $this->assertInRange($character->constitution, 3, 18, 'constitution');
            $this->assertInRange($character->intelligence, 3, 18, 'intelligence');
            $this->assertInRange($character->wisdom, 3, 18, 'wisdom');
            $this->assertInRange($character->charisma, 3, 18, 'charisma');

            $expectedHitpoints = 10 + DndCharacter::modifier($character->constitution);
            $this->assertEquals(
                $expectedHitpoints,
                $character->hitpoints,
                'The calculated hitpoints value ' . $character->hitpoints
                    . ' is not ' . $expectedHitpoints . '.',
            );
        }
    }

    /**
     * uuid dca2b2ec-f729-4551-84b9-078876bb4808
     * @testdox Each ability is only calculated once
     */
    public function testEachAbilityIsCalculatedOnce()
    {
        for ($i = 0; $i < 10; $i++) {
            $character = DndCharacter::generate();
            $this->assertDoesNotChange($character->strength, $character->strength, 'strength');
            $this->assertDoesNotChange($character->dexterity, $character->dexterity, 'dexterity');
            $this->assertDoesNotChange($character->constitution, $character->constitution, 'constitution');
            $this->assertDoesNotChange($character->intelligence, $character->intelligence, 'intelligence');
            $this->assertDoesNotChange($character->wisdom, $character->wisdom, 'wisdom');
            $this->assertDoesNotChange($character->charisma, $character->charisma, 'charisma');
        }
    }

    private function assertInRange(int $value, int $start, int $end, string $valueName = ''): void
    {
        $this->assertThat(
            $value,
            $this->logicalAnd(
                $this->greaterThanOrEqual($start),
                $this->lessThanOrEqual($end)
            ),
            'The calculated'
                . (empty($valueName) ? '' : (' ' . $valueName))
                . ' value ' . $value
                . ' is not between ' . $start . ' and ' . $end . '.',
        );
    }

    private function assertDoesNotChange(
        int $valueFirstAccess,
        int $valueSecondAccess,
        string $valueName = ''
    ): void {
        $this->assertEquals(
            $valueFirstAccess,
            $valueSecondAccess,
            'The'
                . (empty($valueName) ? '' : (' ' . $valueName))
                . ' value changed from ' . $valueFirstAccess
                . ' to ' . $valueSecondAccess
                . ' when accessed a second time.',
        );
    }
}
