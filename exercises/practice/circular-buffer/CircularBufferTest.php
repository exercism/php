<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;

require_once 'CircularBuffer.php';

use PHPUnit\Framework\TestCase;

class CircularBufferTest extends TestCase
{
    /**
     * uuid: 28268ed4-4ff3-45f3-820e-895b44d53dfa
     */
    #[TestDox('reading empty buffer should fail')]
    public function testReadingEmptyBufferShouldFail(): void
    {
        $buffer = new CircularBuffer(1);
        $this->expectException(BufferEmptyError::class);
        $buffer->read();
    }

    /**
     * uuid: 2e6db04a-58a1-425d-ade8-ac30b5f318f3
     */
    #[TestDox('can read an item just written')]
    public function testCanReadAnItemJustWritten(): void
    {
        $buffer = new CircularBuffer(1);
        $buffer->write('1');
        $this->assertSame('1', $buffer->read());
    }

    /**
     * uuid: 90741fe8-a448-45ce-be2b-de009a24c144
     */
    #[TestDox('each item may only be read once')]
    public function testEachItemMayOnlyBeReadOnce(): void
    {
        $buffer = new CircularBuffer(1);
        $buffer->write('1');
        $this->assertSame('1', $buffer->read());
        $this->expectException(BufferEmptyError::class);
        $buffer->read();
    }

    /**
     * uuid: be0e62d5-da9c-47a8-b037-5db21827baa7
     */
    #[TestDox('items are read in the order they are written')]
    public function testItemsAreReadInTheOrderTheyAreWritten(): void
    {
        $buffer = new CircularBuffer(2);
        $buffer->write('1');
        $buffer->write('2');
        $this->assertSame('1', $buffer->read());
        $this->assertSame('2', $buffer->read());
    }

    /**
     * uuid: 2af22046-3e44-4235-bfe6-05ba60439d38
     */
    #[TestDox("full buffer can't be written to")]
    public function testFullBufferCantBeWrittenTo(): void
    {
        $buffer = new CircularBuffer(1);
        $buffer->write('1');
        $this->expectException(BufferFullError::class);
        $buffer->write('2');
    }

    /**
     * uuid: 547d192c-bbf0-4369-b8fa-fc37e71f2393
     */
    #[TestDox('a read frees up capacity for another write')]
    public function testAReadFreesUpCapacityForAnotherWrite(): void
    {
        $buffer = new CircularBuffer(1);
        $buffer->write('1');
        $this->assertSame('1', $buffer->read());
        $buffer->write('2');
        $this->assertSame('2', $buffer->read());
    }

    /**
     * uuid: 04a56659-3a81-4113-816b-6ecb659b4471
     */
    #[TestDox('read position is maintained even across multiple writes')]
    public function testReadPositionIsMaintainedEvenAcrossMultipleWrites(): void
    {
        $buffer = new CircularBuffer(3);
        $buffer->write('1');
        $buffer->write('2');
        $this->assertSame('1', $buffer->read());
        $buffer->write('3');
        $this->assertSame('2', $buffer->read());
        $this->assertSame('3', $buffer->read());
    }

    /**
     * uuid: 60c3a19a-81a7-43d7-bb0a-f07242b1111f
     */
    #[TestDox("items cleared out of buffer can't be read")]
    public function testItemsClearedOutOfBufferCantBeRead(): void
    {
        $buffer = new CircularBuffer(1);
        $buffer->write('1');
        $buffer->clear();
        $this->expectException(BufferEmptyError::class);
        $buffer->read();
    }

    /**
     * uuid: 45f3ae89-3470-49f3-b50e-362e4b330a59
     */
    #[TestDox('clear frees up capacity for another write')]
    public function testClearFreesUpCapacityForAnotherWrite(): void
    {
        $buffer = new CircularBuffer(1);
        $buffer->write('1');
        $buffer->clear();
        $buffer->write('2');
        $this->assertSame('2', $buffer->read());
    }

    /**
     * uuid: e1ac5170-a026-4725-bfbe-0cf332eddecd
     */
    #[TestDox('clear does nothing on empty buffer')]
    public function testClearDoesNothingOnEmptyBuffer(): void
    {
        $buffer = new CircularBuffer(1);
        $buffer->clear();
        $buffer->write('1');
        $this->assertSame('1', $buffer->read());
    }

    /**
     * uuid: 9c2d4f26-3ec7-453f-a895-7e7ff8ae7b5b
     */
    #[TestDox('overwrite acts like write on non-full buffer')]
    public function testOverwriteActsLikeWriteOnNonFullBuffer(): void
    {
        $buffer = new CircularBuffer(2);
        $buffer->write('1');
        $buffer->forceWrite('2');
        $this->assertSame('1', $buffer->read());
        $this->assertSame('2', $buffer->read());
    }

    /**
     * uuid: 880f916b-5039-475c-bd5c-83463c36a147
     */
    #[TestDox('overwrite replaces the oldest item on full buffer')]
    public function testOverwriteReplacesTheOldestItemOnFullBuffer(): void
    {
        $buffer = new CircularBuffer(2);
        $buffer->write('1');
        $buffer->write('2');
        $buffer->forceWrite('3');
        $this->assertSame('2', $buffer->read());
        $this->assertSame('3', $buffer->read());
    }

    /**
     * uuid: bfecab5b-aca1-4fab-a2b0-cd4af2b053c3
     */
    #[TestDox('overwrite replaces the oldest item remaining in buffer following a read')]
    public function testOverwriteReplacesTheOldestItemRemainingInBufferFollowingARead(): void
    {
        $buffer = new CircularBuffer(3);
        $buffer->write('1');
        $buffer->write('2');
        $buffer->write('3');
        $this->assertSame('1', $buffer->read());
        $buffer->write('4');
        $buffer->forceWrite('5');
        $this->assertSame('3', $buffer->read());
        $this->assertSame('4', $buffer->read());
        $this->assertSame('5', $buffer->read());
    }

    /**
     * uuid: 9cebe63a-c405-437b-8b62-e3fdc1ecec5a
     */
    #[TestDox('initial clear does not affect wrapping around')]
    public function testInitialClearDoesNotAffectWrappingAround(): void
    {
        $buffer = new CircularBuffer(2);
        $buffer->clear();
        $buffer->write('1');
        $buffer->write('2');
        $buffer->forceWrite('3');
        $buffer->forceWrite('4');
        $this->assertSame('3', $buffer->read());
        $this->assertSame('4', $buffer->read());
        $this->expectException(BufferEmptyError::class);
        $buffer->read();
    }
}
