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

use PHPUnit\Framework\ExpectationFailedException;

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
            $this->assertInRange($character->strength, 3, 18);
            $this->assertInRange($character->dexterity, 3, 18);
            $this->assertInRange($character->constitution, 3, 18);
            $this->assertInRange($character->intelligence, 3, 18);
            $this->assertInRange($character->wisdom, 3, 18);
            $this->assertInRange($character->charisma, 3, 18);

            $this->assertEquals(
                $character->hitpoints,
                10 + DndCharacter::modifier($character->constitution)
            );
        }
    }

    public function testEachAbilityIsCalculatedOnce()
    {
        for ($i = 0; $i < 10; $i++) {
            $character = DndCharacter::generate();
            $this->assertEquals($character->strength, $character->strength);
            $this->assertEquals($character->dexterity, $character->dexterity);
            $this->assertEquals($character->constitution, $character->constitution);
            $this->assertEquals($character->intelligence, $character->intelligence);
            $this->assertEquals($character->wisdom, $character->wisdom);
            $this->assertEquals($character->charisma, $character->charisma);
        }
    }

    /**
     * @throws ExpectationFailedException
     */
    private function assertInRange(int $value, $start, $end): void
    {
        $this->assertThat(
            $value,
            $this->logicalAnd(
                $this->greaterThanOrEqual($start),
                $this->lessThanOrEqual($end)
            ),
            "The given value $value is not between $start and $end."
        );
    }
}
