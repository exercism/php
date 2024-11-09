<?php

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
