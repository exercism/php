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
        $this->assertEquals(8.0, total($basket));
    }

    /**
     * A basket containing only two of the same book.
     * Target grouping: [[2], [2]]
     */
    public function testTwoSame(): void
    {
        $basket = [2, 2];
        $this->assertEquals(16.0, total($basket));
    }

    /**
     * No charge to carry around an empty basket.
     * Target grouping: []
     */
    public function testEmpty(): void
    {
        $basket = [];
        $this->assertEquals(0.0, total($basket));
    }

    /**
     * A basket containing only two different books.
     * Target grouping: [[1, 2]]
     */
    public function testTwoDifferent(): void
    {
        $basket = [1, 2];
        $this->assertEquals(15.2, total($basket));
    }

    /**
     * A basket of three different books.
     * Target grouping: [[1, 2, 3]]
     */
    public function testThreeDifferent(): void
    {
        $basket = [1, 2, 3];
        $this->assertEquals(21.60, total($basket));
    }

    /**
     * A basket of four different books.
     * Target grouping: [[1, 2, 3, 4]]
     */
    public function testFourDifferent(): void
    {
        $basket = [1, 2, 3, 4];
        $this->assertEquals(25.60, total($basket));
    }

    /**
     * A basket of five different books.
     * Target grouping: [[1, 2, 3, 4, 5]]
     */
    public function testFiveDifferent(): void
    {
        $basket = [1, 2, 3, 4, 5];
        $this->assertEquals(30.00, total($basket));
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
        $this->assertEquals(51.20, total($basket));
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
        $this->assertEquals(55.60, total($basket));
    }

    /**
     * A basket containing ten books consisting of two
     * copies of each book in the series.
     * Target grouping: [[1, 2, 3, 4, 5], [1, 2, 3, 4, 5]]
     */
    public function testFivePairs(): void
    {
        $basket = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5];
        $this->assertEquals(60.00, total($basket));
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
        $this->assertEquals(68.00, total($basket));
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
        $this->assertEquals(75.20, total($basket));
    }
}
