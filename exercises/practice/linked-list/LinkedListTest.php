<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class LinkedListTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'LinkedList.php';
    }

    /**
     * uuid: c3f67e5d-cfa2-4c3e-a18f-7ce999c3c885
     */
    #[TestDox('push/pop respectively add/remove at the end of the list')]
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

     /**
     * uuid: 37962ee0-3324-4a29-b588-5a4c861e6564
     */
    #[TestDox('shift gets first element from the list')]
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

    /**
     * uuid: 30a3586b-e9dc-43fb-9a73-2770cec2c718
     */
    #[TestDox('unshift adds element at start of the list')]
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

    /**
     * uuid: 7f7e3987-b954-41b8-8084-99beca08752c
     */
    #[TestDox('pop gets element from the list')]
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

     /**
     * uuid: 042f71e4-a8a7-4cf0-8953-7e4f3a21c42d
     */
    #[TestDox('pop, push, shift, and unshift can be used in any order')]
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
