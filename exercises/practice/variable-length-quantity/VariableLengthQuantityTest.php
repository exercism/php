<?php

class VariableLengthQuantityTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'VariableLengthQuantity.php';
    }

    public function testItEncodesSingleBytes(): void
    {
        $this->assertEquals([0x00], vlq_encode([0x00]));
        $this->assertEquals([0x40], vlq_encode([0x40]));
        $this->assertEquals([0x7f], vlq_encode([0x7f]));
    }

    public function testItEncodesDoubleBytes(): void
    {
        $this->assertEquals([0x81, 0x00], vlq_encode([0x80]));
        $this->assertEquals([0xc0, 0x00], vlq_encode([0x2000]));
        $this->assertEquals([0xff, 0x7f], vlq_encode([0x3fff]));
    }

    public function testItEncodesTripleBytes(): void
    {
        $this->assertEquals([0x81, 0x80, 0x00], vlq_encode([0x4000]));
        $this->assertEquals([0xc0, 0x80, 0x00], vlq_encode([0x100000]));
        $this->assertEquals([0xff, 0xff, 0x7f], vlq_encode([0x1fffff]));
    }

    public function testItEncodesQuadrupleBytes(): void
    {
        $this->assertEquals([0x81, 0x80, 0x80, 0x00], vlq_encode([0x200000]));
        $this->assertEquals([0xc0, 0x80, 0x80, 0x00], vlq_encode([0x8000000]));
        $this->assertEquals([0xff, 0xff, 0xff, 0x7f], vlq_encode([0xfffffff]));
    }

    public function testItEncodesMultipleValues(): void
    {
        $this->assertEquals([0x00, 0x00], vlq_encode([0x00, 0x00]));
        $this->assertEquals([0x40, 0x7f], vlq_encode([0x40, 0x7f]));
        $this->assertEquals([0x81, 0x80, 0x00, 0xc8, 0xe8, 0x56], vlq_encode([0x4000, 0x123456]));
        $this->assertEquals([
            0xc0, 0x00, 0xc8, 0xe8, 0x56,
            0xff, 0xff, 0xff, 0x7f, 0x00,
            0xff, 0x7f, 0x81, 0x80, 0x00,
        ], vlq_encode(
            [0x2000, 0x123456, 0x0fffffff, 0x00, 0x3fff, 0x4000]
        ));
    }

    public function testItDecodesFromSyngleBytes(): void
    {
        $this->assertEquals([0x00], vlq_decode([0x00]));
        $this->assertEquals([0x40], vlq_decode([0x40]));
        $this->assertEquals([0x7f], vlq_decode([0x7f]));
    }

    public function testItDecodesDoubleBytes(): void
    {
        $this->assertEquals([0x80], vlq_decode([0x81, 0x00]));
        $this->assertEquals([0x2000], vlq_decode([0xc0, 0x00]));
        $this->assertEquals([0x3fff], vlq_decode([0xff, 0x7f]));
    }

    public function testItDecodesTripleBytes(): void
    {
        $this->assertEquals([0x4000], vlq_decode([0x81, 0x80, 0x00]));
        $this->assertEquals([0x100000], vlq_decode([0xc0, 0x80, 0x00]));
        $this->assertEquals([0x1FFFFF], vlq_decode([0xff, 0xff, 0x7f]));
    }

    public function testItDecodesQuadrupleBytes(): void
    {
        $this->assertEquals([0x200000], vlq_decode([0x81, 0x80, 0x80, 0x00]));
        $this->assertEquals([0x8000000], vlq_decode([0xc0, 0x80, 0x80, 0x00]));
        $this->assertEquals([0xFFFFFFF], vlq_decode([0xff, 0xff, 0xff, 0x7f]));
    }

    public function testItDecodesMultipleValues(): void
    {
        $this->assertEquals([0x00, 0x00], vlq_decode([0x00, 0x00]));
        $this->assertEquals([0x40, 0x7f], vlq_decode([0x40, 0x7f]));
        $this->assertEquals([0x4000, 0x123456], vlq_decode([0x81, 0x80, 0x00, 0xc8, 0xe8, 0x56]));
        $this->assertEquals(
            [0x2000, 0x123456, 0x0fffffff, 0x00, 0x3fff, 0x4000],
            vlq_decode([
                0xc0, 0x00, 0xc8, 0xe8, 0x56,
                0xff, 0xff, 0xff, 0x7f, 0x00,
                0xff, 0x7f, 0x81, 0x80, 0x00,
            ])
        );
    }

    public function testIncompleteByteSequence(): void
    {
        $this->expectException(InvalidArgumentException::class);

        vlq_decode([0xff]);
    }

    public function testOverflow(): void
    {
        $this->expectException(OverflowException::class);

        vlq_decode([0xff, 0xff, 0xff, 0xff, 0xff, 0xff, 0xff, 0xff, 0xff, 0x7f]);
    }

    public function testChainedDecodeEncodeGivesOriginalBytes(): void
    {
        $bytes = [
            0xc0, 0x00, 0xc8, 0xe8, 0x56,
            0xff, 0xff, 0xff, 0x7f, 0x00,
            0xff, 0x7f, 0x81, 0x80, 0x00,
        ];

        $this->assertTrue($bytes === vlq_encode(vlq_decode($bytes)));
    }

    public function testChainedEncodeDecodeGivesOriginalIntegers(): void
    {
        $integers = [0x2000, 0x123456, 0x0fffffff, 0x00, 0x3fff, 0x4000];

        $this->assertEquals($integers, vlq_decode(vlq_encode($integers)));
    }
}
