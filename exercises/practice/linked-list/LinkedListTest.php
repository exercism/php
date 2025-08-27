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
     * uuid: 7f7e3987-b954-41b8-8084-99beca08752c
     */
    #[TestDox('pop gets element from the list')]
    public function testPopGetsElementFromTheList(): void
    {
        $list = new LinkedList();
        $list->push(7);

        $this->assertEquals(7, $list->pop());
    }

    /**
     * uuid: c3f67e5d-cfa2-4c3e-a18f-7ce999c3c885
     */
    #[TestDox('push/pop respectively add/remove at the end of the list')]
    public function testPushPopRespectivelyAddRemoveAtTheEndOfTheList(): void
    {
        $list = new LinkedList();
        $list->push(11);
        $list->push(13);

        $this->assertEquals(13, $list->pop());
        $this->assertEquals(11, $list->pop());
    }


    /**
     * uuid: 00ea24ce-4f5c-4432-abb4-cc6e85462657
     */
    #[TestDox('shift gets an element from the list')]
    public function testShiftGetsAnElementFromTheList(): void
    {
        $list = new LinkedList();
        $list->push(17);

        $this->assertEquals(17, $list->shift());
    }


    /**
     * uuid: 37962ee0-3324-4a29-b588-5a4c861e6564
     */
    #[TestDox('shift gets first element from the list')]
    public function testShiftGetsFirstElementFromTheList(): void
    {
        $list = new LinkedList();
        $list->push(23);
        $list->push(5);

        $this->assertEquals(23, $list->shift());
        $this->assertEquals(5, $list->shift());
    }

    /**
     * uuid: 30a3586b-e9dc-43fb-9a73-2770cec2c718
     */
    #[TestDox('unshift adds element at start of the list')]
    public function testUnshiftAddsElementAtStartOfTheList(): void
    {
        $list = new LinkedList();
        $list->unshift(23);
        $list->unshift(5);

        $this->assertEquals(5, $list->shift());
        $this->assertEquals(23, $list->shift());
    }



    /**
     * uuid: 042f71e4-a8a7-4cf0-8953-7e4f3a21c42d
     */
    #[TestDox('pop, push, shift, and unshift can be used in any order')]
    public function testPopPushShiftAndUnshiftCanBeUsedInAnyOrder(): void
    {
        $list = new LinkedList();
        $list->push(1);
        $list->push(2);
        $this->assertEquals(2, $list->pop());
        $list->push(3);
        $this->assertEquals(1, $list->shift());
        $list->unshift(4);
        $list->push(5);
        $this->assertEquals(4, $list->shift());
        $this->assertEquals(5, $list->pop());
        $this->assertEquals(3, $list->shift());
    }

    /**
     * uuid: 88f65c0c-4532-4093-8295-2384fb2f37df
     */
    #[TestDox('count an empty list')]
    public function testCountAnEmptyList(): void
    {
        $list = new LinkedList();
        $this->assertEquals(0, $list->count());
    }

    /**
     * uuid: fc055689-5cbe-4cd9-b994-02e2abbb40a5
     */
    #[TestDox('count a list with items')]
    public function testCountAListWithItems(): void
    {
        $list = new LinkedList();
        $list->push(37);
        $list->push(1);

        $this->assertEquals(2, $list->count());
    }

    /**
     * uuid: 8272cef5-130d-40ea-b7f6-5ffd0790d650
     */
    #[TestDox('count is correct after mutation')]
    public function testCountIsCorrectAfterMutation(): void
    {
        $list = new LinkedList();

        $list->push(31);
        $this->assertEquals(1, $list->count());

        $list->unshift(43);
        $this->assertEquals(2, $list->count());

        $list->shift();
        $this->assertEquals(1, $list->count());

        $list->pop();
        $this->assertEquals(0, $list->count());
    }

    /**
     * uuid: 229b8f7a-bd8a-4798-b64f-0dc0bb356d95
     */
    #[TestDox("popping to empty doesn't break the list")]
    public function testPoppingToEmptyDoesNotBreakTheList(): void
    {
        $list = new LinkedList();

        $list->push(41);
        $list->push(59);

        $list->pop();
        $list->pop();

        $list->push(47);
        $this->assertEquals(1, $list->count());

        $this->assertEquals(47, $list->pop());
    }

    /**
     * uuid: 4e1948b4-514e-424b-a3cf-a1ebbfa2d1ad
     */
    #[TestDox("shifting to empty doesn't break the list")]
    public function testShiftingToEmptyDoesNotBreakTheList(): void
    {
        $list = new LinkedList();

        $list->push(41);
        $list->push(59);

        $list->shift();
        $list->shift();

        $list->push(47);
        $this->assertEquals(1, $list->count());

        $this->assertEquals(47, $list->shift());
    }

    /**
     * uuid: e8f7c600-d597-4f79-949d-8ad8bae895a6
     */
    #[TestDox("deletes the only element")]
    public function testDeletesTheOnlyElement(): void
    {
        $list = new LinkedList();

        $list->push(61);
        $list->delete(61);

        $this->assertEquals(0, $list->count());
    }

    /**
     * uuid: fd65e422-51f3-45c0-9fd0-c33da638f89b
     */
    #[TestDox('deletes the element with the specified value from the list')]
    public function testDeletesTheElementWithTheSpecifiedValueFromTheList(): void
    {
        $list = new LinkedList();
        $list->push(71);
        $list->push(83);
        $list->push(79);

        $list->delete(83);

        $this->assertEquals(2, $list->count());
        $this->assertEquals(79, $list->pop());
        $this->assertEquals(71, $list->shift());
    }

    /**
     * uuid: 59db191a-b17f-4ab7-9c5c-60711ec1d013
     */
    #[TestDox('deletes the element with the specified value from the list, re-assigns tail')]
    public function testDeletesTheElementWithTheSpecifiedValueFromTheListReassignsTail(): void
    {
        $list = new LinkedList();
        $list->push(71);
        $list->push(83);
        $list->push(79);

        $list->delete(83);

        $this->assertEquals(2, $list->count());
        $this->assertEquals(79, $list->pop());
        $this->assertEquals(71, $list->pop());
    }

    /**
     * uuid: 58242222-5d39-415b-951d-8128247f8993
     */
    #[TestDox('deletes the element with the specified value from the list, re-assigns head')]
    public function testDeletesTheElementWithTheSpecifiedValueFromTheListReassignsHead(): void
    {
        $list = new LinkedList();
        $list->push(71);
        $list->push(83);
        $list->push(79);

        $list->delete(83);

        $this->assertEquals(2, $list->count());
        $this->assertEquals(71, $list->shift());
        $this->assertEquals(79, $list->shift());
    }

    /**
     * uuid: ee3729ee-3405-4bd2-9bad-de0d4aa5d647
     */
    #[TestDox('deletes the first of two elements')]
    public function testDeletesTheFirstOfTwoElements(): void
    {
        $list = new LinkedList();
        $list->push(97);
        $list->push(101);

        $list->delete(97);

        $this->assertEquals(1, $list->count());
        $this->assertEquals(101, $list->pop());
    }

    /**
     * uuid: 47e3b3b4-b82c-4c23-8c1a-ceb9b17cb9fb
     */
    #[TestDox('deletes the second of two elements')]
    public function testDeletesTheSecondOfTwoElements(): void
    {
        $list = new LinkedList();
        $list->push(97);
        $list->push(101);

        $list->delete(101);

        $this->assertEquals(1, $list->count());
        $this->assertEquals(97, $list->pop());
    }

    /**
     * uuid: 7b420958-f285-4922-b8f9-10d9dcab5179
     */
    #[TestDox('delete does not modify the list if the element is not found')]
    public function testDeleteDoesNotModifyTheListIfTheElementIsNotFound(): void
    {
        $list = new LinkedList();
        $list->push(89);

        $list->delete(103);

        $this->assertEquals(1, $list->count());
    }

    /**
     * uuid: 7e04828f-6082-44e3-a059-201c63252a76
     */
    #[TestDox('deletes only the first occurrence')]
    public function testDeleteOnlyTheFirstOccurrence(): void
    {
        $list = new LinkedList();
        $list->push(73);
        $list->push(9);
        $list->push(9);
        $list->push(107);

        $list->delete(9);

        $this->assertEquals(3, $list->count());
        $this->assertEquals(107, $list->pop());
        $this->assertEquals(9, $list->pop());
        $this->assertEquals(73, $list->pop());
    }
}
