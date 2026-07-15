<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class StrainTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Strain.php';
    }

    /**
     * uuid: 26af8c32-ba6a-4eb3-aa0a-ebd8f136e003
     */
    #[TestDox('Keep on empty list returns empty list')]
    public function testKeepOnEmptyListReturnsEmptyList(): void
    {
        $strain = new Strain();
        $list = [];
        $predicate = function ($x) {
            return true;
        };

        $this->assertEquals([], $strain->keep($list, $predicate));
    }

    /**
     * uuid: f535cb4d-e99b-472a-bd52-9fa0ffccf454
     */
    #[TestDox('Keeps everything')]
    public function testKeepsEverything(): void
    {
        $strain = new Strain();
        $list = [1, 3, 5];
        $predicate = function ($x) {
            return true;
        };

        $this->assertEquals([1, 3, 5], $strain->keep($list, $predicate));
    }

    /**
     * uuid: 950b8e8e-f628-42a8-85e2-9b30f09cde38
     */
    #[TestDox('Keeps nothing')]
    public function testKeepNothing(): void
    {
        $strain = new Strain();
        $list = [1, 3, 5];
        $predicate = function ($x) {
            return false;
        };

        $this->assertEquals([], $strain->keep($list, $predicate));
    }

    /**
     * uuid: 92694259-6e76-470c-af87-156bdf75018a
     */
    #[TestDox('Keeps first and last')]
    public function testKeepFirstAndLast(): void
    {
        $strain = new Strain();
        $list = [1, 2, 3];
        $predicate = function ($x) {
            return $x % 2 === 1;
        };

        $this->assertEquals([1, 3], $strain->keep($list, $predicate));
    }

    /**
     * uuid: 938f7867-bfc7-449e-a21b-7b00cbb56994
     */
    #[TestDox('Keeps neither first nor last')]
    public function testKeepNeitherFirstNorLast(): void
    {
        $strain = new Strain();
        $list = [1, 2, 3];
        $predicate = function ($x) {
            return $x % 2 === 0;
        };

        $this->assertEquals([2], $strain->keep($list, $predicate));
    }

    /**
     * uuid: 8908e351-4437-4d2b-a0f7-770811e4881
     */
    #[TestDox('Keeps strings')]
    public function testKeepStrings(): void
    {
        $strain = new Strain();
        $list = ["apple", "zebra", "banana", "zombies", "cherimoya", "zealot"];
        $predicate = function ($x) {
            return str_starts_with($x, 'z');
        };

        $this->assertEquals(["zebra", "zombies", "zealot"], $strain->keep($list, $predicate));
    }

    /**
     * uuid: 2728036b-102a-4f1e-a3ef-eac6160d876a
     */
    #[TestDox('Keeps lists')]
    public function testKeepsLists(): void
    {
        $strain = new Strain();
        $list = [
            [1, 2, 3],
            [5, 5, 5],
            [5, 1, 2],
            [2, 1, 2],
            [1, 5, 2],
            [2, 2, 1],
            [1, 2, 5]
        ];
        $predicate = function ($x) {
            return in_array(5, $x, true);
        };

        $expected = [
            [5, 5, 5],
            [5, 1, 2],
            [1, 5, 2],
            [1, 2, 5]
        ];

        $this->assertEquals($expected, $strain->keep($list, $predicate));
    }

    /**
     * uuid: ef16beb9-8d84-451a-996a-14e80607fce6
     */
    #[TestDox('Discard on empty list returns empty list')]
    public function testDiscardOnEmptyListReturnsEmptyList(): void
    {
        $strain = new Strain();
        $list = [];
        $predicate = function ($x) {
            return true;
        };

        $this->assertEquals([], $strain->discard($list, $predicate));
    }

    /**
     * uuid: 2f42f9bc-8e06-4afe-a222-051b5d8cd12a
     */
    #[TestDox('Discards everything')]
    public function testDiscardEverything(): void
    {
        $strain = new Strain();
        $list = [1, 3, 5];
        $predicate = function ($x) {
            return true;
        };

        $this->assertEquals([], $strain->discard($list, $predicate));
    }

    /**
     * uuid: ca990fdd-08c2-4f95-aa50-e0f5e1d6802b
     */
    #[TestDox('Discards nothing')]
    public function testDiscardNothing(): void
    {
        $strain = new Strain();
        $list = [1, 3, 5];
        $predicate = function ($x) {
            return false;
        };

        $this->assertEquals([1, 3, 5], $strain->discard($list, $predicate));
    }

    /**
     * uuid: 71595dae-d283-48ca-a52b-45fa96819d2f
     */
    #[TestDox('Discards first and last')]
    public function testDiscardFirstAndLast(): void
    {
        $strain = new Strain();
        $list = [1, 2, 3];
        $predicate = function ($x) {
            return $x % 2 === 1;
        };

        $this->assertEquals([2], $strain->discard($list, $predicate));
    }

    /**
     * uuid: ae141f79-f86d-4567-b407-919eaca0f3dd
     */
    #[TestDox('Discards neither first nor last')]
    public function testDiscardNeitherFirstNorLast(): void
    {
        $strain = new Strain();
        $list = [1, 2, 3];
        $predicate = function ($x) {
            return $x % 2 === 0;
        };

        $this->assertEquals([1,3], $strain->discard($list, $predicate));
    }

    /**
     * uuid: daf25b36-a59f-4f29-bcfe-302eb4e43609
     */
    #[TestDox('Discards strings')]
    public function testDiscardStrings(): void
    {
        $strain = new Strain();
        $list = ["apple", "zebra", "banana", "zombies", "cherimoya", "zealot"];
        $predicate = function ($x) {
            return str_starts_with($x, 'z');
        };

        $this->assertEquals(["apple", "banana", "cherimoya"], $strain->discard($list, $predicate));
    }

    /**
     * uuid: a38d03f9-95ad-4459-80d1-48e937e4acaf
     */
    #[TestDox('Discards lists')]
    public function testDiscardLists(): void
    {
        $strain = new Strain();
        $list = [
            [1, 2, 3],
            [5, 5, 5],
            [5, 1, 2],
            [2, 1, 2],
            [1, 5, 2],
            [2, 2, 1],
            [1, 2, 5]
        ];
        $predicate = function ($x) {
            return in_array(5, $x, true);
        };

        $expected = [
            [1, 2, 3],
            [2, 1, 2],
            [2, 2, 1]
        ];

        $this->assertEquals($expected, $strain->discard($list, $predicate));
    }
}
