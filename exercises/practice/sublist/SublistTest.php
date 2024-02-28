<?php

declare(strict_types=1);

class SublistTest extends PHPUnit\Framework\TestCase
{
    private Sublist $sublist;

    public static function setUpBeforeClass(): void
    {
        require_once 'Sublist.php';
    }

    public function setUp(): void
    {
        $this->sublist = new Sublist();
    }

    /**
     * uuid: 97319c93-ebc5-47ab-a022-02a1980e1d29
     */
    public function testEmptyLists(): void
    {
        $listOne = [];
        $listTwo = [];

        $this->assertEquals('EQUAL', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: de27dbd4-df52-46fe-a336-30be58457382
     */
    public function testEmptyListWithinNonEmptyList(): void
    {
        $listOne = [];
        $listTwo = [1, 2, 3];

        $this->assertEquals('SUBLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 5487cfd1-bc7d-429f-ac6f-1177b857d4fb
     */
    public function testNonEmptyListContainsEmptyList(): void
    {
        $listOne = [1, 2, 3];
        $listTwo = [];

        $this->assertEquals('SUPERLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 1f390b47-f6b2-4a93-bc23-858ba5dda9a6
     */
    public function testListEqualsItself(): void
    {
        $listOne = [1, 2, 3];
        $listTwo = [1, 2, 3];

        $this->assertEquals('EQUAL', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 7ed2bfb2-922b-4363-ae75-f3a05e8274f5
     */
    public function testDifferentLists(): void
    {
        $listOne = [1, 2, 3];
        $listTwo = [2, 3, 4];

        $this->assertEquals('UNEQUAL', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 3b8a2568-6144-4f06-b0a1-9d266b365341
     */
    public function testFalseStart(): void
    {
        $listOne = [1, 2, 5];
        $listTwo = [0, 1, 2, 3, 1, 2, 5, 6];

        $this->assertEquals('SUBLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: dc39ed58-6311-4814-be30-05a64bc8d9b1
     */
    public function testConsecutive(): void
    {
        $listOne = [1, 1, 2];
        $listTwo = [0, 1, 1, 1, 2, 1, 2];

        $this->assertEquals('SUBLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: d1270dab-a1ce-41aa-b29d-b3257241ac26
     */
    public function testSublistAtStart(): void
    {
        $listOne = [0, 1, 2];
        $listTwo = [0, 1, 2, 3, 4, 5];

        $this->assertEquals('SUBLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 81f3d3f7-4f25-4ada-bcdc-897c403de1b6
     */
    public function testSublistInMiddle(): void
    {
        $listOne = [2, 3, 4];
        $listTwo = [0, 1, 2, 3, 4, 5];

        $this->assertEquals('SUBLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 43bcae1e-a9cf-470e-923e-0946e04d8fdd
     */
    public function testSublistAtEnd(): void
    {
        $listOne = [3, 4, 5];
        $listTwo = [0, 1, 2, 3, 4, 5];

        $this->assertEquals('SUBLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 76cf99ed-0ff0-4b00-94af-4dfb43fe5caa
     */
    public function testAtStartOfSuperlist(): void
    {
        $listOne = [0, 1, 2, 3, 4, 5];
        $listTwo = [0, 1, 2];

        $this->assertEquals('SUPERLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: b83989ec-8bdf-4655-95aa-9f38f3e357fd
     */
    public function testInMiddleOfSuperlist(): void
    {
        $listOne = [0, 1, 2, 3, 4, 5];
        $listTwo = [2, 3];

        $this->assertEquals('SUPERLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 26f9f7c3-6cf6-4610-984a-662f71f8689b
     */
    public function testAtEndOfSuperlist(): void
    {
        $listOne = [0, 1, 2, 3, 4, 5];
        $listTwo = [3, 4, 5];

        $this->assertEquals('SUPERLIST', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 0a6db763-3588-416a-8f47-76b1cedde31e
     */
    public function testFirstListMissingElementFromSecondList(): void
    {
        $listOne = [1, 3];
        $listTwo = [1, 2, 3];

        $this->assertEquals('UNEQUAL', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 83ffe6d8-a445-4a3c-8795-1e51a95e65c3
     */
    public function testSecondListMissingElementFromFirstList(): void
    {
        $listOne = [1, 2, 3];
        $listTwo = [1, 3];

        $this->assertEquals('UNEQUAL', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 7bc76cb8-5003-49ca-bc47-cdfbe6c2bb8
     */
    public function testFirstListMissingAdditionalDigitsFromSecondList(): void
    {
        $listOne = [1, 2];
        $listTwo = [1, 22];

        $this->assertEquals('UNEQUAL', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 0d7ee7c1-0347-45c8-9ef5-b88db152b30b
     */
    public function testOrderMattersToList(): void
    {
        $listOne = [1, 2, 3];
        $listTwo = [3, 2, 1];

        $this->assertEquals('UNEQUAL', $this->sublist->compare($listOne, $listTwo));
    }

    /**
     * uuid: 5f47ce86-944e-40f9-9f31-6368aad70aa6
     */
    public function testSameDigitsButDifferentNumbers(): void
    {
        $listOne = [1, 0, 1];
        $listTwo = [10, 1];

        $this->assertEquals('UNEQUAL', $this->sublist->compare($listOne, $listTwo));
    }
}
