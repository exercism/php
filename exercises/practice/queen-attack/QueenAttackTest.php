<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class QueenAttackTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'QueenAttack.php';
    }

    /**
     * uuid: 3ac4f735-d36c-44c4-a3e2-316f79704203
     */
    #[TestDox('Test creation of Queens with valid and invalid positions -> Queen with a valid position')]
    public function testCreationOfQueensWithValidAndInvalidPositionsCreateQueenWithValidPosition(): void
    {
        $this->assertTrue(placeQueen(2, 2));
    }

    /**
     * uuid: 4e812d5d-b974-4e38-9a6b-8e0492bfa7be
     */
    #[TestDox('Test creation of Queens with valid and invalid positions -> Queen must have positive row')]
    public function testCreationOfQueensWithValidAndInvalidPositionsQueenMustHavePositiveRow(): void
    {
        $this->expectException(InvalidArgumentException::class);
        placeQueen(-2, 2);
    }

    /**
     * uuid: f07b7536-b66b-4f08-beb9-4d70d891d5c8
     */
    #[TestDox('Test creation of Queens with valid and invalid positions -> Queen must have row on board')]
    public function testCreationOfQueensWithValidAndInvalidPositionsQueenMustHaveRowOnBoard(): void
    {
        $this->expectException(InvalidArgumentException::class);
        placeQueen(8, 4);
    }

    /**
     * uuid: 15a10794-36d9-4907-ae6b-e5a0d4c54ebe
     */
     #[TestDox('Test creation of Queens with valid and invalid positions -> Queen must have positive column')]
    public function testCreationOfQueensWithValidAndInvalidPositionsQueenMustHavePositiveColumn(): void
    {
        $this->expectException(InvalidArgumentException::class);
        placeQueen(2, -2);
    }

    /**
     * uuid: 6907762d-0e8a-4c38-87fb-12f2f65f0ce4
     */
    #[TestDox('Test creation of Queens with valid and invalid positions -> Queen must have column on board')]
    public function testCreationOfQueensWithValidAndInvalidPositionsQueenMustHaveColumnOnBoard(): void
    {
        $this->expectException(InvalidArgumentException::class);
        placeQueen(4, 8);
    }

    /**
     * uuid: 33ae4113-d237-42ee-bac1-e1e699c0c007
     */
    #[TestDox('Test the ability of one queen to attack another -> Cannot attack')]
    public function testTheAbilityOfOneQueenToAttackAnotherCannotAttack(): void
    {
        $this->assertFalse(canAttack([2, 4], [6, 6]));
    }

    /**
     * uuid: eaa65540-ea7c-4152-8c21-003c7a68c914
     */
    #[TestDox('Test the ability of one queen to attack another -> Can attack on same row')]
    public function testTheAbilityOfOneQueenToAttackAnotherCanAttackOnSameRow(): void
    {
        $this->assertTrue(canAttack([2, 4], [2, 6]));
    }

    /**
     * uuid: bae6f609-2c0e-4154-af71-af82b7c31cea
     */
    #[TestDox('Test the ability of one queen to attack another -> Can attack on same column')]
    public function testTheAbilityOfOneQueenToAttackAnotherCanAttackOnSameColumn(): void
    {
        $this->assertTrue(canAttack([4, 5], [2, 5]));
    }

    /**
     * uuid: 0e1b4139-b90d-4562-bd58-dfa04f1746c7
     */
    #[TestDox('Test the ability of one queen to attack another -> Can attack on first diagonal')]
    public function testTheAbilityOfOneQueenToAttackAnotherCanAttackOnFirstDiagonal(): void
    {
        $this->assertTrue(canAttack([2, 2], [0, 4]));
    }

    /**
     * uuid: ff9b7ed4-e4b6-401b-8d16-bc894d6d3dcd
     */
    #[TestDox('Test the ability of one queen to attack another -> Can attack on second diagonal')]
    public function testTheAbilityOfOneQueenToAttackAnotherCanAttackOnSecondDiagonal(): void
    {
        $this->assertTrue(canAttack([2, 2], [3, 1]));
    }

    /**
     * uuid: 0a71e605-6e28-4cc2-aa47-d20a2e71037a
     */
    #[TestDox('Test the ability of one queen to attack another -> Can attack on third diagonal')]
    public function testTheAbilityOfOneQueenToAttackAnotherCanAttackOnThirdDiagonal(): void
    {
        $this->assertTrue(canAttack([2, 2], [1, 1]));
    }

    /**
     * uuid: 0790b588-ae73-4f1f-a968-dd0b34f45f86
     */
    #[TestDox('Test the ability of one queen to attack another -> Can attack on fourth diagonal')]
    public function testTheAbilityOfOneQueenToAttackAnotherCanAttackOnFourthDiagonal(): void
    {
        $this->assertTrue(canAttack([1, 7], [0, 6]));
    }

    /**
     * uuid: 543f8fd4-2597-4aad-8d77-cbdab63619f8
     */
    #[TestDox('Test the ability of one queen to attack another -> Cannot attack if falling diagonals are only the same when reflected across the longest falling diagonal')]
    public function testTheAbilityOfOneQueenToAttackAnotherCannotAttackReflectedDiagonal(): void
    {
        $this->assertFalse(canAttack([4, 1], [2, 5]));
    }
}
