<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class BinarySearchTreeTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'BinarySearchTree.php';
    }

    /**
     * uuid e9c93a78-c536-4750-a336-94583d23fafa
     */
    #[TestDox('data is retained')]
    public function testDataIsRetained(): void
    {
        $tree = new BinarySearchTree(4);
        $this->assertEquals(4, $tree->data);
    }

    /**
     * uuid 7a95c9e8-69f6-476a-b0c4-4170cb3f7c91
     */
    #[TestDox('smaller number at left node')]
    public function testSmallNumberAtLeftNode(): void
    {
        $tree = new BinarySearchTree(4);
        $tree->insert(2);

        $this->assertEquals(4, $tree->data);
        $this->assertEquals(2, $tree->left->data);
    }

    /**
     * uuid 22b89499-9805-4703-a159-1a6e434c1585
     */
    #[TestDox('same number at left node')]
    public function testSameNumberLeftNodes(): void
    {
        $tree = new BinarySearchTree(4);
        $tree->insert(4);

        $this->assertEquals(4, $tree->data);
        $this->assertEquals(4, $tree->left->data);
    }

    /**
     * uuid 2e85fdde-77b1-41ed-b6ac-26ce6b663e34
     */
    #[TestDox('greater number at right node')]
    public function testGreaterNumberRightNode(): void
    {
        $tree = new BinarySearchTree(4);
        $tree->insert(5);

        $this->assertEquals(4, $tree->data);
        $this->assertEquals(5, $tree->right->data);
    }

    /**
     * uuid dd898658-40ab-41d0-965e-7f145bf66e0b
     */
    #[TestDox('can create complex tree')]
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

    /**
     * uuid 9e0c06ef-aeca-4202-b8e4-97f1ed057d56
     */
    #[TestDox('can sort single number')]
    public function testCanSortSingleNode(): void
    {
        $tree = new BinarySearchTree(2);

        $this->assertEquals([2], $tree->getSortedData());
    }

    /**
     * uuid 425e6d07-fceb-4681-a4f4-e46920e380bb
     */
    #[TestDox('can sort if second number is smaller than first')]
    public function testCanSortSmallerSecondNumber(): void
    {
        $tree = new BinarySearchTree(2);
        $tree->insert(1);

        $this->assertEquals([1, 2], $tree->getSortedData());
    }

    /**
     * uuid bd7532cc-6988-4259-bac8-1d50140079ab
     */
    #[TestDox('can sort if second number is same as first')]
    public function testCanSortSameNumbers(): void
    {
        $tree = new BinarySearchTree(2);
        $tree->insert(2);

        $this->assertEquals([2, 2], $tree->getSortedData());
    }

    /**
     * uuid b6d1b3a5-9d79-44fd-9013-c83ca92ddd36
     */
    #[TestDox('can sort if second number is greater than first')]
    public function testCanSortGreaterSecondNumber(): void
    {
        $tree = new BinarySearchTree(2);
        $tree->insert(3);

        $this->assertEquals([2, 3], $tree->getSortedData());
    }

    /**
     * uuid d00ec9bd-1288-4171-b968-d44d0808c1c8
     */
    #[TestDox('can sort complex tree')]
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
