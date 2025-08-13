<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class LinkedListTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'LinkedList.php';
    }

    public function testPushAndPopAreFirstInLastOut(): void
    {
        $list = new LinkedList();
        $list->push(10);
        $list->push(20);
        $list->push(15);

        $this->assertEquals(15, $list->pop());
        $this->assertEquals(20, $list->pop());
        $this->assertEquals(10, $list->pop());
    }

    public function testPushAndShiftAreFirstInFirstOut(): void
    {
        $list = new LinkedList();
        $list->push(10);
        $list->push(20);
        $list->push(15);

        $this->assertEquals(10, $list->shift());
        $this->assertEquals(20, $list->shift());
        $this->assertEquals(15, $list->shift());
    }

    public function testUnshiftAndShiftAreLastInFirstOut(): void
    {
        $list = new LinkedList();
        $list->unshift(10);
        $list->unshift(20);
        $list->unshift(15);

        $this->assertEquals(15, $list->shift());
        $this->assertEquals(20, $list->shift());
        $this->assertEquals(10, $list->shift());
    }

    public function testUnshiftAndPopAreLastInLastOut(): void
    {
        $list = new LinkedList();
        $list->unshift(10);
        $list->unshift(20);
        $list->unshift(15);

        $this->assertEquals(10, $list->pop());
        $this->assertEquals(20, $list->pop());
        $this->assertEquals(15, $list->pop());
    }

    public function testAllMethodsCanBeUsedTogether(): void
    {
        $list = new LinkedList();
        $list->push(10);
        $list->push(20);
        $this->assertEquals(20, $list->pop());
        $list->push(15);
        $this->assertEquals(10, $list->shift());
        $list->unshift(40);
        $list->push(50);
        $this->assertEquals(40, $list->shift());
        $this->assertEquals(50, $list->pop());
        $this->assertEquals(15, $list->shift());
    }
}
