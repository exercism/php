<?php

declare(strict_types=1);

class DndCharacterTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'DndCharacter.php';
    }

    public function testAbilityModifierFor3IsNegative4()
    {
        $this->assertEquals(-4, DndCharacter::modifier(3));
    }

    public function testAbilityModifierFor4IsNegative3()
    {
        $this->assertEquals(-3, DndCharacter::modifier(4));
    }

    public function testAbilityModifierFor5IsNegative3()
    {
        $this->assertEquals(-3, DndCharacter::modifier(5));
    }

    public function testAbilityModifierFor6IsNegative2()
    {
        $this->assertEquals(-2, DndCharacter::modifier(6));
    }

    public function testAbilityModifierFor7IsNegative2()
    {
        $this->assertEquals(-2, DndCharacter::modifier(7));
    }

    public function testAbilityModifierFor8IsNegative1()
    {
        $this->assertEquals(-1, DndCharacter::modifier(8));
    }

    public function testAbilityModifierFor9IsNegative1()
    {
        $this->assertEquals(-1, DndCharacter::modifier(9));
    }

    public function testAbilityModifierFor10Is0()
    {
        $this->assertEquals(0, DndCharacter::modifier(10));
    }

    public function testAbilityModifierFor11Is0()
    {
        $this->assertEquals(0, DndCharacter::modifier(11));
    }

    public function testAbilityModifierFor12Is1()
    {
        $this->assertEquals(1, DndCharacter::modifier(12));
    }

    public function testAbilityModifierFor13Is1()
    {
        $this->assertEquals(1, DndCharacter::modifier(13));
    }

    public function testAbilityModifierFor14Is2()
    {
        $this->assertEquals(2, DndCharacter::modifier(14));
    }

    public function testAbilityModifierFor15Is2()
    {
        $this->assertEquals(2, DndCharacter::modifier(15));
    }

    public function testAbilityModifierFor16Is3()
    {
        $this->assertEquals(3, DndCharacter::modifier(16));
    }

    public function testAbilityModifierFor17Is3()
    {
        $this->assertEquals(3, DndCharacter::modifier(17));
    }

    public function testAbilityModifierFor18is4()
    {
        $this->assertEquals(4, DndCharacter::modifier(18));
    }

    public function testRandomAbilityIsInRange()
    {
        for ($i = 0; $i < 10; $i++) {
            $ability = DndCharacter::ability();
            $this->assertInRange($ability, 3, 18);
        }
    }

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
                    . ' is not '. $expectedHitpoints . '.',
            );
        }
    }

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
