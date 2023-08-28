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

class BinarySearchTreeTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'BinarySearchTree.php';
    }

    public function testDataIsRetained(): void
    {
        $tree = new BinarySearchTree(4);
        $this->assertEquals(4, $tree->data);
    }

    public function testSmallNumberAtLeftNode(): void
    {
        $tree = new BinarySearchTree(4);
        $tree->insert(2);

        $this->assertEquals(4, $tree->data);
        $this->assertEquals(2, $tree->left->data);
    }

    public function testSameNumberLeftNodes(): void
    {
        $tree = new BinarySearchTree(4);
        $tree->insert(4);

        $this->assertEquals(4, $tree->data);
        $this->assertEquals(4, $tree->left->data);
    }

    public function testGreaterNumberRightNode(): void
    {
        $tree = new BinarySearchTree(4);
        $tree->insert(5);

        $this->assertEquals(4, $tree->data);
        $this->assertEquals(5, $tree->right->data);
    }

    public function testCreateComplexTree(): void
    {
        $tree = new BinarySearchTree(4);
        $tree->insert(2);
        $tree->insert(6);
        $tree->insert(1);
        $tree->insert(3);
        $tree->insert(5);
        $tree->insert(7);

        $this->assertEquals(4, $tree->data);
        $this->assertEquals(2, $tree->left->data);
        $this->assertEquals(1, $tree->left->left->data);
        $this->assertEquals(3, $tree->left->right->data);
        $this->assertEquals(6, $tree->right->data);
        $this->assertEquals(5, $tree->right->left->data);
        $this->assertEquals(7, $tree->right->right->data);
    }

    public function testCanSortSingleNode(): void
    {
        $tree = new BinarySearchTree(2);

        $this->assertEquals([2], $tree->getSortedData());
    }

    public function testCanSortSmallerSecondNumber(): void
    {
        $tree = new BinarySearchTree(2);
        $tree->insert(1);

        $this->assertEquals([1, 2], $tree->getSortedData());
    }

    public function testCanSortSameNumbers(): void
    {
        $tree = new BinarySearchTree(2);
        $tree->insert(2);

        $this->assertEquals([2, 2], $tree->getSortedData());
    }

    public function testCanSortGreaterSecondNumber(): void
    {
        $tree = new BinarySearchTree(2);
        $tree->insert(3);

        $this->assertEquals([2, 3], $tree->getSortedData());
    }

    public function testCanSortComplexTree(): void
    {
        $tree = new BinarySearchTree(2);
        $tree->insert(1);
        $tree->insert(3);
        $tree->insert(6);
        $tree->insert(7);
        $tree->insert(5);

        $this->assertEquals([1, 2, 3, 5, 6, 7], $tree->getSortedData());
    }
}
