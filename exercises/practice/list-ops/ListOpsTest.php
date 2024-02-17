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

class ListOpsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ListOps.php';
    }

    /**
     * @testdox append entries to a list and return the new list -> empty lists
     */
    public function testAppendEmptyLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->append([], []));
    }

    /**
     * @testdox append entries to a list and return the new list -> list to empty list
     */
    public function testAppendNonEmptyListToEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4], $listOps->append([1, 2, 3, 4], []));
    }

    /**
     * @testdox append entries to a list and return the new list -> empty list to list
     */
    public function testAppendEmptyListToNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4], $listOps->append([], [1, 2, 3, 4]));
    }

    /**
     * @testdox append entries to a list and return the new list -> non-empty lists
     */
    public function testAppendNonEmptyLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 2, 3, 4, 5], $listOps->append([1, 2], [2, 3, 4, 5]));
    }

    /**
     * @testdox concatenate a list of lists -> empty list
     */
    public function testConcatEmptyLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->concat([], []));
    }

    /**
     * @testdox concatenate a list of lists -> list of lists
     */
    public function testConcatLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4, 5, 6], $listOps->concat([1, 2], [3], [], [4, 5, 6]));
    }

    /**
     * @testdox concatenate a list of lists -> list of nested lists
     */
    public function testConcatNestedLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([[1], [2], [3], [], [4, 5, 6]], $listOps->concat([[1], [2]], [[3]], [[]], [[4, 5, 6]]));
    }

    /**
     * @testdox filter list returning only values that satisfy the filter function -> empty list
     */
    public function testFilterEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            [],
            $listOps->filter(static fn ($el) => $el % 2 === 1, [])
        );
    }

    /**
     * @testdox filter list returning only values that satisfy the filter function -> non empty list
     */
    public function testFilterNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            [1, 3, 5],
            $listOps->filter(static fn ($el) => $el % 2 === 1, [1, 2, 3, 5])
        );
    }

    /**
     * @testdox returns the length of a list -> empty list
     */
    public function testLengthEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(0, $listOps->length([]));
    }

    /**
     * @testdox returns the length of a list -> non-empty list
     */
    public function testLengthNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(4, $listOps->length([1, 2, 3, 4]));
    }

    /**
     * @testdox returns a list of elements whose values equal the list value transformed by the mapping function -> empty list
     */
    public function testMapEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            [],
            $listOps->map(static fn ($el) => $el + 1, [])
        );
    }

    /**
     * @testdox returns a list of elements whose values equal the list value transformed by the mapping function -> non-empty list
     */
    public function testMapNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            [2, 4, 6, 8],
            $listOps->map(static fn ($el) => $el + 1, [1, 3, 5, 7])
        );
    }

    /**
     * @testdox folds (reduces) the given list from the left with a function -> empty list
     */
    public function testFoldlEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            2,
            $listOps->foldl(static fn ($acc, $el) => $el * $acc, [], 2)
        );
    }

    /**
     * @testdox folds (reduces) the given list from the left with a function -> direction independent function applied to non-empty list
     */
    public function testFoldlDirectionIndependentNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            15,
            $listOps->foldl(static fn ($acc, $el) => $acc + $el, [1, 2, 3, 4], 5)
        );
    }

    /**
     * @testdox folds (reduces) the given list from the left with a function -> direction dependent function applied to non-empty list
     */
    public function testFoldlDirectionDependentNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            64,
            $listOps->foldl(static fn ($acc, $el) => $el / $acc, [1, 2, 3, 4], 24)
        );
    }

    /**
     * @testdox folds (reduces) the given list from the right with a function -> empty list
     */
    public function testFoldrEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            2,
            $listOps->foldr(static fn ($acc, $el) => $el * $acc, [], 2)
        );
    }

    /**
     * @testdox folds (reduces) the given list from the right with a function -> direction independent function applied to non-empty list
     */
    public function testFoldrDirectionIndependentNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            15,
            $listOps->foldr(static fn ($acc, $el) => $acc + $el, [1, 2, 3, 4], 5)
        );
    }

    /**
     * @testdox folds (reduces) the given list from the right with a function -> direction dependent function applied to non-empty list
     */
    public function testFoldrDirectionDependentNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            9,
            $listOps->foldr(static fn ($acc, $el) => $el / $acc, [1, 2, 3, 4], 24)
        );
    }

    /**
     * @testdox reverse the elements of a list -> empty list
     */
    public function testReverseEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->reverse([]));
    }

    /**
     * @testdox reverse the elements of a list -> non-empty list
     */
    public function testReverseNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([7, 5, 3, 1], $listOps->reverse([1, 3, 5, 7]));
    }

    /**
     * @testdox reverse the elements of a list -> list of lists is not flattened
     */
    public function testReverseNonEmptyListIsNotFlattened()
    {
        $listOps = new ListOps();
        $this->assertEquals([[4, 5, 6], [], [3], [1, 2]], $listOps->reverse([[1, 2], [3], [], [4, 5, 6]]));
    }
}
