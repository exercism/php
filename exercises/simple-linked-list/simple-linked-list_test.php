<?php

require 'simple-linked-list.php';

class LinkedListTester extends PHPUnit_Framework_TestCase
{
    public function testNewListIsEmpty()
    {
        $list = new LinkedList();
        $this->assertEquals(0, $list->size());
    }

    public function testCanAddToList()
    {
        $this->markTestSkipped();
        $list = new LinkedList();
        $list->push(3);
        $list->push(7);
        $list->push(9);
        $this->assertEquals(3, $list->size());
    }

    /**
     * @expectedException Exception
     */
    public function testPopOnEmptyListWillThrowException()
    {
        $this->markTestSkipped();
        $list = new LinkedList();
        $list->pop();
    }

    public function testPopReturnsLastElementAdded()
    {
        $this->markTestSkipped();
        $list = new LinkedList();
        $list->push(5);
        $list->push(1);
        $list->push(8);
        $this->assertEquals(8, $list->pop());
        $this->assertEquals(1, $list->pop());
        $this->assertEquals(5, $list->pop());
    }

    public function testPopRemovesTheLastElementAdded()
    {
        $this->markTestSkipped();
        $list = new LinkedList();
        $list->push(8);
        $list->push(5);
        $list->push(1);
        $this->assertEquals(3, $list->size());
        $this->assertEquals(1, $list->pop());
        $this->assertEquals(2, $list->size());
    }

    public function testReverseFunctionReversesList()
    {
        $this->markTestSkipped();
        $list = new LinkedList();
        $list->push(8);
        $list->push(5);
        $list->push(1);
        $list->reverse();
        $this->assertEquals(8, $list->pop());
        $this->assertEquals(5, $list->pop());
        $this->assertEquals(1, $list->pop());
    }

    public function testCanReturnListAsArray()
    {
        $this->markTestSkipped();
        $list = new LinkedList();
        $list->push(8);
        $list->push(5);
        $list->push(1);
        $this->assertEquals([1, 5, 8], $list->asArray());
    }

    public function testReturnsEmptyListAsEmptyArray()
    {
        $this->markTestSkipped();
        $list = new LinkedList();
        $this->assertEquals([], $list->asArray());
    }
}
