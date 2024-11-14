<?php

declare(strict_types=1);

/**
 * Calculate lowest price for shopping basket only
 * containing books from a single series. There is no
 * discount advantage for having more than one copy of
 * any single book in a grouping.
 */

class BookStoreTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'BookStore.php';
    }

    /**
     * A basket containing only a single book.
     * Target grouping: [[1]]
     *
     * uuid 17146bd5-2e80-4557-ab4c-05632b6b0d01
     * @testdox Only a single book
     */
    public function testSingleBook(): void
    {
        $basket = [1];
        $this->assertEquals(800, total($basket));
    }

    /**
     * A basket containing only two of the same book.
     * Target grouping: [[2], [2]]
     *
     * uuid cc2de9ac-ff2a-4efd-b7c7-bfe0f43271ce
     * @testdox Two of the same book
     */
    public function testTwoSame(): void
    {
        $basket = [2, 2];
        $this->assertEquals(1600, total($basket));
    }

    /**
     * No charge to carry around an empty basket.
     * Target grouping: []
     *
     * uuid 5a86eac0-45d2-46aa-bbf0-266b94393a1a
     * @testdox Empty basket
     */
    public function testEmpty(): void
    {
        $basket = [];
        $this->assertEquals(0, total($basket));
    }

    /**
     * A basket containing only two different books.
     * Target grouping: [[1, 2]]
     *
     * uuid 158bd19a-3db4-4468-ae85-e0638a688990
     * @testdox Two different books
     */
    public function testTwoDifferent(): void
    {
        $basket = [1, 2];
        $this->assertEquals(1520, total($basket));
    }

    /**
     * A basket of three different books.
     * Target grouping: [[1, 2, 3]]
     *
     * uuid f3833f6b-9332-4a1f-ad98-6c3f8e30e163
     * @testdox Three different books
     */
    public function testThreeDifferent(): void
    {
        $basket = [1, 2, 3];
        $this->assertEquals(2160, total($basket));
    }

    /**
     * A basket of four different books.
     * Target grouping: [[1, 2, 3, 4]]
     *
     * uuid 1951a1db-2fb6-4cd1-a69a-f691b6dd30a2
     * @testdox Four different books
     */
    public function testFourDifferent(): void
    {
        $basket = [1, 2, 3, 4];
        $this->assertEquals(2560, total($basket));
    }

    /**
     * A basket of five different books.
     * Target grouping: [[1, 2, 3, 4, 5]]
     *
     * uuid d70f6682-3019-4c3f-aede-83c6a8c647a3
     * @testdox Five different books
     */
    public function testFiveDifferent(): void
    {
        $basket = [1, 2, 3, 4, 5];
        $this->assertEquals(3000, total($basket));
    }

    /**
     * A basket containing eight books consisting of a
     * pair each of the first three books plus one copy
     * each of the last two books. Please pay careful
     * attention to this particular target grouping, it
     * is not intuitive, but does grant the largest
     * discount.
     * Target grouping: [[1, 2, 3, 4], [1, 2, 3, 5]]
     *
     * uuid 78cacb57-911a-45f1-be52-2a5bd428c634
     * @testdox Two groups of four is cheaper than group of five plus group of three
     */
    public function testEight(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 5];
        $this->assertEquals(5120, total($basket));
    }

    /**
     * Target Grouping: [[1, 2, 4, 5], [1, 3, 4, 5]]
     *
     * uuid f808b5a4-e01f-4c0d-881f-f7b90d9739da
     * @testdox Two groups of four is cheaper than groups of five and three
     */
    public function testTwoGroupsOfFourIsCheaperThanGroupsOfFiveAndThree(): void
    {
        $basket = [1, 1, 2, 3, 4, 4, 5, 5];
        $this->assertEquals(5120, total($basket));
    }

    /**
     * Target Grouping: [[1, 2, 3, 4], [1, 2]]
     *
     * uuid fe96401c-5268-4be2-9d9e-19b76478007c
     * @testdox Group of four plus group of two is cheaper than two groups of three
     */
    public function testGroupOfFourPlusGroupOfTwoIsCheaperThanTwoGroupsOfThree(): void
    {
        $basket = [1, 1, 2, 2, 3, 4];
        $this->assertEquals(4080, total($basket));
    }

    /**
     * A basket containing nine books consisting of a
     * pair each of the first four books plus one of
     * the last book.
     * Target grouping: [[1, 2, 3, 4, 5], [1, 2, 3, 4]],
     *
     * uuid 68ea9b78-10ad-420e-a766-836a501d3633
     * @testdox Two each of first four books and one copy each of rest
     */
    public function testFourPairsPlusOne(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 4, 5];
        $this->assertEquals(5560, total($basket));
    }

    /**
     * A basket containing ten books consisting of two
     * copies of each book in the series.
     * Target grouping: [[1, 2, 3, 4, 5], [1, 2, 3, 4, 5]]
     *
     * uuid c0a779d5-a40c-47ae-9828-a340e936b866
     * @testdox Two copies of each boo
     */
    public function testFivePairs(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5];
        $this->assertEquals(6000, total($basket));
    }

    /**
     * A basket containing eleven books consisting
     * of three copies of the first book plus two each
     * of the remaining four books in the series.
     * Target grouping: [[1, 2, 3, 4, 5], [1, 2, 3, 4, 5], [1]]
     *
     * uuid 18fd86fe-08f1-4b68-969b-392b8af20513
     * @testdox Three copies of first book and two each of remaining
     */
    public function testFivePairsPlusOne(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 1];
        $this->assertEquals(6800, total($basket));
    }

    /**
     * A basket containing twelve books consisting of
     * three copies of the first two books, plus two
     * each of the remaining three books in the series.
     * Target grouping: [[1, 2, 3, 4, 5], [1, 2, 3, 4, 5], [1, 2]]
     *
     * uuid 0b19a24d-e4cf-4ec8-9db2-8899a41af0da
     * @testdox Three each of first two books and two each of remaining books
     */
    public function testTwelve(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 1, 2];
        $this->assertEquals(7520, total($basket));
    }

    /**
     * Target Grouping: [[1, 2, 3, 4], [1, 2, 3, 5], [1, 2, 3, 4], [1, 2, 3, 5]]
     *
     * uuid bb376344-4fb2-49ab-ab85-e38d8354a58d
     * @testdox Four groups of four are cheaper than two groups each of five and three
     */
    public function testFourGroupsOfFourAreCheaperThanTwoGroupsEachOfFiveAndThree(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 5, 1, 1, 2, 2, 3, 3, 4, 5];
        $this->assertEquals(10240, total($basket));
    }

    /**
     * Target Grouping: [[1, 2, 3, 4], [1, 2, 3, 5], [1, 2, 3, 4], [1, 2, 3, 5], [1, 2, 3], [1, 2, 3]]
     *
     * uuid 5260ddde-2703-4915-b45a-e54dbbac4303
     * @testdox Check that groups of 4 are created properly even when there are more groups of 3 than groups of 5
     */
    public function testCheckThatGroupsOfFourAreCreatedProperlyEvenWhenThereAreMoreGroupsOfThreeThanGroupsOfFive(): void
    {
        $basket = [1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 4, 4, 5, 5];
        $this->assertEquals(14560, total($basket));
    }

    /**
     * Target Grouping: [[1], [1, 2, 3, 4]]
     *
     * uuid b0478278-c551-4747-b0fc-7e0be3158b1f
     * @testdox One group of one and four is cheaper than one group of two and three
     */
    public function testOneGroupOfOneAndFourIsCheaperThanOneGroupOfTwoAndThree(): void
    {
        $basket = [1, 1, 2, 3, 4];
        $this->assertEquals(3360, total($basket));
    }

    /**
     * Target Grouping: [[5], [5, 4], [5, 4, 3, 2], [5, 4, 3, 2], [5, 4, 3, 1]]
     *
     * uuid cf868453-6484-4ae1-9dfc-f8ee85bbde01
     * @testdox One group of one and two plus three groups of four is cheaper than one group of each size
     */
    public function testOneGroupOfOneAndTwoPlusThreeGroupsOfFourIsCheaperThanOneGroupOfEachSize(): void
    {
        $basket = [1, 2, 2, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 5];
        $this->assertEquals(10000, total($basket));
    }
}
