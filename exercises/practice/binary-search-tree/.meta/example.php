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

class BinarySearchTree
{
    public ?BinarySearchTree $left;
    public ?BinarySearchTree $right;
    public int $data;

    public function __construct(int $data)
    {
        $this->data  = $data;
        $this->left  = null;
        $this->right = null;
    }

    public function insert(int $data): self
    {
        $data <= $this->data ? $this->addLeftNode($data) : $this->addRightNode($data);

        return $this;
    }

    public function getSortedData(): array
    {
        $data[] = $this->data;

        if ($this->left) {
            $data = array_merge($this->left->getSortedData(), $data);
        }

        if ($this->right) {
            $data = array_merge($data, $this->right->getSortedData());
        }

        return $data;
    }

    private function addLeftNode(int $data): void
    {
        $this->left = $this->left ? $this->left->insert($data) : new BinarySearchTree($data);
    }

    private function addRightNode(int $data): void
    {
        $this->right = $this->right ? $this->right->insert($data) : new BinarySearchTree($data);
    }
}
