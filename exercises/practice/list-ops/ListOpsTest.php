<?php

declare(strict_types=1);

use PHPUnit\Framework\ExpectationFailedException;

class ListOpsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ListOps.php';
    }

    /**
     * uuid 485b9452-bf94-40f7-a3db-c3cf4850066a
     * @testdox append entries to a list and return the new list -> empty lists
     */
    public function testAppendEmptyLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->append([], []));
    }

    /**
     * uuid 2c894696-b609-4569-b149-8672134d340a
     * @testdox append entries to a list and return the new list -> list to empty list
     */
    public function testAppendNonEmptyListToEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4], $listOps->append([1, 2, 3, 4], []));
    }

    /**
     * uuid e842efed-3bf6-4295-b371-4d67a4fdf19c
     * @testdox append entries to a list and return the new list -> empty list to list
     */
    public function testAppendEmptyListToNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4], $listOps->append([], [1, 2, 3, 4]));
    }

    /**
     * uuid 71dcf5eb-73ae-4a0e-b744-a52ee387922f
     * @testdox append entries to a list and return the new list -> non-empty lists
     */
    public function testAppendNonEmptyLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 2, 3, 4, 5], $listOps->append([1, 2], [2, 3, 4, 5]));
    }

    /**
     * uuid 28444355-201b-4af2-a2f6-5550227bde21
     * @testdox concatenate a list of lists -> empty list
     */
    public function testConcatEmptyLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->concat([], []));
    }

    /**
     * uuid 331451c1-9573-42a1-9869-2d06e3b389a9
     * @testdox concatenate a list of lists -> list of lists
     */
    public function testConcatLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([1, 2, 3, 4, 5, 6], $listOps->concat([1, 2], [3], [], [4, 5, 6]));
    }

    /**
     * uuid d6ecd72c-197f-40c3-89a4-aa1f45827e09
     * @testdox concatenate a list of lists -> list of nested lists
     */
    public function testConcatNestedLists()
    {
        $listOps = new ListOps();
        $this->assertEquals([[1], [2], [3], [], [4, 5, 6]], $listOps->concat([[1], [2]], [[3]], [[]], [[4, 5, 6]]));
    }

    /**
     * uuid 0524fba8-3e0f-4531-ad2b-f7a43da86a16
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
     * uuid 88494bd5-f520-4edb-8631-88e415b62d24
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
     * uuid 1cf0b92d-8d96-41d5-9c21-7b3c37cb6aad
     * @testdox returns the length of a list -> empty list
     */
    public function testLengthEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(0, $listOps->length([]));
    }

    /**
     * uuid d7b8d2d9-2d16-44c4-9a19-6e5f237cb71e
     * @testdox returns the length of a list -> non-empty list
     */
    public function testLengthNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals(4, $listOps->length([1, 2, 3, 4]));
    }

    /**
     * uuid c0bc8962-30e2-4bec-9ae4-668b8ecd75aa
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
     * uuid 11e71a95-e78b-4909-b8e4-60cdcaec0e91
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
     * uuid 36549237-f765-4a4c-bfd9-5d3a8f7b07d2
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
     * uuid 7a626a3c-03ec-42bc-9840-53f280e13067
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
     * uuid d7fcad99-e88e-40e1-a539-4c519681f390
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
     * uuid aeb576b9-118e-4a57-a451-db49fac20fdc
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
     * uuid e1c64db7-9253-4a3d-a7c4-5273b9e2a1bd
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
     * uuid 8066003b-f2ff-437e-9103-66e6df474844
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
     * uuid 94231515-050e-4841-943d-d4488ab4ee30
     * @testdox reverse the elements of a list -> empty list
     */
    public function testReverseEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([], $listOps->reverse([]));
    }

    /**
     * uuid fcc03d1e-42e0-4712-b689-d54ad761f360
     * @testdox reverse the elements of a list -> non-empty list
     */
    public function testReverseNonEmptyList()
    {
        $listOps = new ListOps();
        $this->assertEquals([7, 5, 3, 1], $listOps->reverse([1, 3, 5, 7]));
    }

    /**
     * uuid 40872990-b5b8-4cb8-9085-d91fc0d05d26
     * @testdox reverse the elements of a list -> list of lists is not flattened
     */
    public function testReverseNonEmptyListIsNotFlattened()
    {
        $listOps = new ListOps();
        $this->assertEquals([[4, 5, 6], [], [3], [1, 2]], $listOps->reverse([[1, 2], [3], [], [4, 5, 6]]));
    }
}
