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
     */
    public function testSingleBook(): void
    {
        $basket = [1];
        $this->assertEquals(800, total($basket));
    }

    /**
     * A basket containing only two of the same book.
     * Target grouping: [[2], [2]]
     */
    public function testTwoSame(): void
    {
        $basket = [2, 2];
        $this->assertEquals(1600, total($basket));
    }

    /**
     * No charge to carry around an empty basket.
     * Target grouping: []
     */
    public function testEmpty(): void
    {
        $basket = [];
        $this->assertEquals(0, total($basket));
    }

    /**
     * A basket containing only two different books.
     * Target grouping: [[1, 2]]
     */
    public function testTwoDifferent(): void
    {
        $basket = [1, 2];
        $this->assertEquals(1520, total($basket));
    }

    /**
     * A basket of three different books.
     * Target grouping: [[1, 2, 3]]
     */
    public function testThreeDifferent(): void
    {
        $basket = [1, 2, 3];
        $this->assertEquals(2160, total($basket));
    }

    /**
     * A basket of four different books.
     * Target grouping: [[1, 2, 3, 4]]
     */
    public function testFourDifferent(): void
    {
        $basket = [1, 2, 3, 4];
        $this->assertEquals(2560, total($basket));
    }

    /**
     * A basket of five different books.
     * Target grouping: [[1, 2, 3, 4, 5]]
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
     */
    public function testEight(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 5];
        $this->assertEquals(5120, total($basket));
    }

    /**
     * A basket containing nine books consisting of a
     * pair each of the first four books plus one of
     * the last book.
     * Target grouping: [[1, 2, 3, 4, 5], [1, 2, 3, 4]],
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
     */
    public function testTwelve(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 1, 2];
        $this->assertEquals(7520, total($basket));
    }
}
