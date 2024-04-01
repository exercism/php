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
    public function testAppendEntriesToAListAndReturnTheNewListWithEmptyLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->append([], []));
    }

    /**
     * @testdox append entries to a list and return the new list -> list to empty list
     */
    public function testAppendEntriesToAListAndReturnTheNewListWithListToEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4], $listOps->append([], [1, 2, 3, 4]));
    }

    /**
     * @testdox append entries to a list and return the new list -> empty list to list
     */
    public function testAppendEntriesToAListAndReturnTheNewListWithEmptyListToList()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4], $listOps->append([1, 2, 3, 4], []));
    }

    /**
     * @testdox append entries to a list and return the new list -> non-empty lists
     */
    public function testAppendEntriesToAListAndReturnTheNewListWithNonEmptyLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 2, 3, 4, 5], $listOps->append([1, 2], [2, 3, 4, 5]));
    }

    /**
     * @testdox concatenate a list of lists -> empty list
     */
    public function testConcatenateAListOfListsWithEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->concat());
    }

    /**
     * @testdox concatenate a list of lists -> list of lists
     */
    public function testConcatenateAListOfListsWithListOfLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4, 5, 6], $listOps->concat([1, 2], [3], [], [4, 5, 6]));
    }

    /**
     * @testdox concatenate a list of lists -> list of nested lists
     */
    public function testConcatenateAListOfListsWithListOfNestedLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([[1], [2], [3], [], [4, 5, 6]], $listOps->concat([[1], [2]], [[3]], [[]], [[4, 5, 6]]));
    }

    /**
     * @testdox filter list returning only values that satisfy the filter function -> empty list
     */
    public function testFilterListReturningOnlyValuesThatSatisfyTheFilterFunctionWithEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            [],
            $listOps->filter(static fn ($el) => $el % 2 === 1, [])
        );
    }

    /**
     * @testdox filter list returning only values that satisfy the filter function -> non-empty list
     */
    public function testFilterListReturningOnlyValuesThatSatisfyTheFilterFunctionWithNonEmptyList()
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
    public function testReturnsTheLengthOfAListWithEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(0, $listOps->length([]));
    }

    /**
     * @testdox returns the length of a list -> non-empty list
     */
    public function testReturnsTheLengthOfAListWithNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(4, $listOps->length([1, 2, 3, 4]));
    }

    /**
     * @testdox return a list of elements whose values equal the list value transformed by the mapping function -> empty list
     */
    public function testReturnAListOfElementsWhoseValuesEqualTheListValueTransformedByTheMappingFunctionWithEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            [],
            $listOps->map(static fn ($el) => $el + 1, [])
        );
    }

    /**
     * @testdox return a list of elements whose values equal the list value transformed by the mapping function -> non-empty list
     */
    public function testReturnAListOfElementsWhoseValuesEqualTheListValueTransformedByTheMappingFunctionWithNonEmptyList()
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
    public function testFoldsReducesTheGivenListFromTheLeftWithAFunctionWithEmptyList()
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
    public function testFoldsReducesTheGivenListFromTheLeftWithAFunctionWithDirectionIndependentFunctionAppliedToNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            15,
            $listOps->foldl(static fn ($acc, $el) => $el + $acc, [1, 2, 3, 4], 5)
        );
    }

    /**
     * @testdox folds (reduces) the given list from the left with a function -> direction dependent function applied to non-empty list
     */
    public function testFoldsReducesTheGivenListFromTheLeftWithAFunctionWithDirectionDependentFunctionAppliedToNonEmptyList()
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
    public function testFoldsReducesTheGivenListFromTheRightWithAFunctionWithEmptyList()
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
    public function testFoldsReducesTheGivenListFromTheRightWithAFunctionWithDirectionIndependentFunctionAppliedToNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            15,
            $listOps->foldr(static fn ($acc, $el) => $el + $acc, [1, 2, 3, 4], 5)
        );
    }
    /**
     * @testdox folds (reduces) the given list from the right with a function -> direction dependent function applied to non-empty list
     */
    public function testFoldsReducesTheGivenListFromTheRightWithAFunctionWithDirectionDependentFunctionAppliedToNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(
            9,
            $listOps->foldr(static fn ($acc, $el) => $el / $acc, [1, 2, 3, 4], 24)
        );
    }
        /**
     * @testdox reverse the elements of the list -> empty list
     */
    public function testReverseTheElementsOfTheListWithEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->reverse([]));
    }    /**
     * @testdox reverse the elements of the list -> non-empty list
     */
    public function testReverseTheElementsOfTheListWithNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([7, 5, 3, 1], $listOps->reverse([1, 3, 5, 7]));
    }    /**
     * @testdox reverse the elements of the list -> list of lists is not flattened
     */
    public function testReverseTheElementsOfTheListWithListOfListsIsNotFlattened()
    {
        $listOps = new ListOps();
        $this->assertEquals([[4, 5, 6], [], [3], [1, 2]], $listOps->reverse([[1, 2], [3], [], [4, 5, 6]]));
    }
}
