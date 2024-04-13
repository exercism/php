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
        $list1 = [];
        $list2 = [];
        
        $result = $listOps->append($list1, $list2);

        $this->assertEquals([], $result);
    }

    /**
     * @testdox append entries to a list and return the new list -> list to empty list
     */
    public function testAppendEntriesToAListAndReturnTheNewListWithListToEmptyList()
    {
        $listOps = new ListOps();
        $list1 = [];
        $list2 = [1, 2, 3, 4];
        
        $result = $listOps->append($list1, $list2);

        $this->assertEquals([1, 2, 3, 4], $result);
    }

    /**
     * @testdox append entries to a list and return the new list -> empty list to list
     */
    public function testAppendEntriesToAListAndReturnTheNewListWithEmptyListToList()
    {
        $listOps = new ListOps();
        $list1 = [1, 2, 3, 4];
        $list2 = [];
        
        $result = $listOps->append($list1, $list2);

        $this->assertEquals([1, 2, 3, 4], $result);
    }

    /**
     * @testdox append entries to a list and return the new list -> non-empty lists
     */
    public function testAppendEntriesToAListAndReturnTheNewListWithNonEmptyLists()
    {
        $listOps = new ListOps();
        $list1 = [1, 2];
        $list2 = [2, 3, 4, 5];
        
        $result = $listOps->append($list1, $list2);

        $this->assertEquals([1, 2, 2, 3, 4, 5], $result);
    }

    /**
     * @testdox concatenate a list of lists -> empty list
     */
    public function testConcatenateAListOfListsWithEmptyList()
    {
        $listOps = new ListOps();
        $lists = [];
        
        $result = $listOps->concat($lists);

        $this->assertEquals([], $result);
    }

    /**
     * @testdox concatenate a list of lists -> list of lists
     */
    public function testConcatenateAListOfListsWithListOfLists()
    {
        $listOps = new ListOps();
        $lists = [[1, 2], [3], [], [4, 5, 6]];
        
        $result = $listOps->concat($lists);

        $this->assertEquals([1, 2, 3, 4, 5, 6], $result);
    }

    /**
     * @testdox concatenate a list of lists -> list of nested lists
     */
    public function testConcatenateAListOfListsWithListOfNestedLists()
    {
        $listOps = new ListOps();
        $lists = [[[1], [2]], [[3]], [[]], [[4, 5, 6]]];
        
        $result = $listOps->concat($lists);

        $this->assertEquals([[1], [2], [3], [], [4, 5, 6]], $result);
    }

    /**
     * @testdox filter list returning only values that satisfy the filter function -> empty list
     */
    public function testFilterListReturningOnlyValuesThatSatisfyTheFilterFunctionWithEmptyList()
    {
        $listOps = new ListOps();
        $list = [];
        $function = static fn ($el) => $el % 2 === 1;
        
        $result = $listOps->filter($list, $function);

        $this->assertEquals([], $result);
    }

    /**
     * @testdox filter list returning only values that satisfy the filter function -> non-empty list
     */
    public function testFilterListReturningOnlyValuesThatSatisfyTheFilterFunctionWithNonEmptyList()
    {
        $listOps = new ListOps();
        $list = [1, 2, 3, 5];
        $function = static fn ($el) => $el % 2 === 1;
        
        $result = $listOps->filter($list, $function);

        $this->assertEquals([1, 3, 5], $result);
    }

    /**
     * @testdox returns the length of a list -> empty list
     */
    public function testReturnsTheLengthOfAListWithEmptyList()
    {
        $listOps = new ListOps();
        $list = [];
        
        $result = $listOps->length($list);

        $this->assertEquals(0, $result);
    }

    /**
     * @testdox returns the length of a list -> non-empty list
     */
    public function testReturnsTheLengthOfAListWithNonEmptyList()
    {
        $listOps = new ListOps();
        $list = [1, 2, 3, 4];
        
        $result = $listOps->length($list);

        $this->assertEquals(4, $result);
    }

    /**
     * @testdox return a list of elements whose values equal the list value transformed by the mapping function -> empty list
     */
    public function testReturnAListOfElementsWhoseValuesEqualTheListValueTransformedByTheMappingFunctionWithEmptyList()
    {
        $listOps = new ListOps();
        $list = [];
        $function = static fn ($el) => $el + 1;
        
        $result = $listOps->map($list, $function);

        $this->assertEquals([], $result);
    }

    /**
     * @testdox return a list of elements whose values equal the list value transformed by the mapping function -> non-empty list
     */
    public function testReturnAListOfElementsWhoseValuesEqualTheListValueTransformedByTheMappingFunctionWithNonEmptyList()
    {
        $listOps = new ListOps();
        $list = [1, 3, 5, 7];
        $function = static fn ($el) => $el + 1;
        
        $result = $listOps->map($list, $function);

        $this->assertEquals([2, 4, 6, 8], $result);
    }

    /**
     * @testdox folds (reduces) the given list from the left with a function -> empty list
     */
    public function testFoldsReducesTheGivenListFromTheLeftWithAFunctionWithEmptyList()
    {
        $listOps = new ListOps();
        $list = [];
        $initial = 2;
        $function = static fn ($acc, $el) => $el * $acc;
        
        $result = $listOps->foldl($list, $initial, $function);

        $this->assertEquals(2, $result);
    }

    /**
     * @testdox folds (reduces) the given list from the left with a function -> direction independent function applied to non-empty list
     */
    public function testFoldsReducesTheGivenListFromTheLeftWithAFunctionWithDirectionIndependentFunctionAppliedToNonEmptyList()
    {
        $listOps = new ListOps();
        $list = [1, 2, 3, 4];
        $initial = 5;
        $function = static fn ($acc, $el) => $el + $acc;
        
        $result = $listOps->foldl($list, $initial, $function);

        $this->assertEquals(15, $result);
    }

    /**
     * @testdox folds (reduces) the given list from the left with a function -> direction dependent function applied to non-empty list
     */
    public function testFoldsReducesTheGivenListFromTheLeftWithAFunctionWithDirectionDependentFunctionAppliedToNonEmptyList()
    {
        $listOps = new ListOps();
        $list = [1, 2, 3, 4];
        $initial = 24;
        $function = static fn ($acc, $el) => $el / $acc;
        
        $result = $listOps->foldl($list, $initial, $function);

        $this->assertEquals(64, $result);
    }

    /**
     * @testdox folds (reduces) the given list from the right with a function -> empty list
     */
    public function testFoldsReducesTheGivenListFromTheRightWithAFunctionWithEmptyList()
    {
        $listOps = new ListOps();
        $list = [];
        $initial = 2;
        $function = static fn ($acc, $el) => $el * $acc;
        
        $result = $listOps->foldr($list, $initial, $function);

        $this->assertEquals(2, $result);
    }

    /**
     * @testdox folds (reduces) the given list from the right with a function -> direction independent function applied to non-empty list
     */
    public function testFoldsReducesTheGivenListFromTheRightWithAFunctionWithDirectionIndependentFunctionAppliedToNonEmptyList()
    {
        $listOps = new ListOps();
        $list = [1, 2, 3, 4];
        $initial = 5;
        $function = static fn ($acc, $el) => $el + $acc;
        
        $result = $listOps->foldr($list, $initial, $function);

        $this->assertEquals(15, $result);
    }

    /**
     * @testdox folds (reduces) the given list from the right with a function -> direction dependent function applied to non-empty list
     */
    public function testFoldsReducesTheGivenListFromTheRightWithAFunctionWithDirectionDependentFunctionAppliedToNonEmptyList()
    {
        $listOps = new ListOps();
        $list = [1, 2, 3, 4];
        $initial = 24;
        $function = static fn ($acc, $el) => $el / $acc;
        
        $result = $listOps->foldr($list, $initial, $function);

        $this->assertEquals(9, $result);
    }

    /**
     * @testdox reverse the elements of the list -> empty list
     */
    public function testReverseTheElementsOfTheListWithEmptyList()
    {
        $listOps = new ListOps();
        $list = [];
        
        $result = $listOps->reverse($list);

        $this->assertEquals([], $result);
    }

    /**
     * @testdox reverse the elements of the list -> non-empty list
     */
    public function testReverseTheElementsOfTheListWithNonEmptyList()
    {
        $listOps = new ListOps();
        $list = [1, 3, 5, 7];
        
        $result = $listOps->reverse($list);

        $this->assertEquals([7, 5, 3, 1], $result);
    }

    /**
     * @testdox reverse the elements of the list -> list of lists is not flattened
     */
    public function testReverseTheElementsOfTheListWithListOfListsIsNotFlattened()
    {
        $listOps = new ListOps();
        $list = [[1, 2], [3], [], [4, 5, 6]];
        
        $result = $listOps->reverse($list);

        $this->assertEquals([[4, 5, 6], [], [3], [1, 2]], $result);
    }

    }
