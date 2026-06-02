<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class VariableLengthQuantityTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'VariableLengthQuantity.php';
    }

    /**
     * uuid 35c9db2e-f781-4c52-b73b-8e76427defd0
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> zero')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesZero(): void
    {
        $this->assertEquals([0x00], vlq_encode([0x00]));
    }

    /**
     * uuid be44d299-a151-4604-a10e-d4b867f41540
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> arbitrary single byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesArbitrarySingleByte(): void
    {
        $this->assertEquals([0x40], vlq_encode([0x40]));
    }

    /**
     * uuid 890bc344-cb80-45af-b316-6806a6971e81
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> asymmetric single byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesAsymmetricSingleByte(): void
    {
        $this->assertEquals([0x53], vlq_encode([0x53]));
    }

    /**
     * uuid ea399615-d274-4af6-bbef-a1c23c9e1346
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> largest single byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesLargestSingleByte(): void
    {
        $this->assertEquals([0x7f], vlq_encode([0x7f]));
    }

    /**
     * uuid 77b07086-bd3f-4882-8476-8dcafee79b1c
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> smallest double byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesSmallestDoubleByte(): void
    {
        $this->assertEquals([0x81, 0x00], vlq_encode([0x80]));
    }

    /**
     * uuid 63955a49-2690-4e22-a556-0040648d6b2d
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> arbitrary double byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesArbitraryDoubleByte(): void
    {
        $this->assertEquals([0xC0, 0x00], vlq_encode([0x2000]));
    }

    /**
     * uuid 4977d113-251b-4d10-a3ad-2f5a7756bb58
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> asymmetric double byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesAsymmetricDoubleByte(): void
    {
        $this->assertEquals([0x81, 0x2D], vlq_encode([0xAD]));
    }

    /**
     * uuid 29da7031-0067-43d3-83a7-4f14b29ed97a
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> largest double byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesLargestDoubleByte(): void
    {
        $this->assertEquals([0xFF, 0x7F], vlq_encode([0x3FFF]));
    }

    /**
     * uuid 3345d2e3-79a9-4999-869e-d4856e3a8e01
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> smallest triple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesSmallestTripleByte(): void
    {
        $this->assertEquals([0x81, 0x80, 0x00], vlq_encode([0x4000]));
    }

    /**
     * uuid 5df0bc2d-2a57-4300-a653-a75ee4bd0bee
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> arbitrary triple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesArbitraryTripleByte(): void
    {
        $this->assertEquals([0xC0, 0x80, 0x00], vlq_encode([0x100000]));
    }

    /**
     * uuid 6731045f-1e00-4192-b5ae-98b22e17e9f7
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> asymmetric triple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesAsymmetricTripleByte(): void
    {
        $this->assertEquals([0x87, 0xAB, 0x1C], vlq_encode([0x1D6DC]));
    }

    /**
     * uuid f51d8539-312d-4db1-945c-250222c6aa22
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> largest triple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesLargestTripleByte(): void
    {
        $this->assertEquals([0xFF, 0xFF, 0x7F], vlq_encode([0x1FFFFF]));
    }

    /**
     * uuid da78228b-544f-47b7-8bfe-d16b35bbe570
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> smallest quadruple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesSmallestQuadrupleByte(): void
    {
        $this->assertEquals([0x81, 0x80, 0x80, 0x00], vlq_encode([0x200000]));
    }

    /**
     * uuid 11ed3469-a933-46f1-996f-2231e05d7bb6
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> arbitrary quadruple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesArbitraryQuadrupleByte(): void
    {
        $this->assertEquals([0xC0, 0x80, 0x80, 0x00], vlq_encode([0x8000000]));
    }

    /**
     * uuid b45ef770-cbba-48c2-bd3c-c6362679516e
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> asymmetric quadruple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesAsymmetricQuadrupleByte(): void
    {
        $this->assertEquals([0x81, 0xD5, 0xEE, 0x04], vlq_encode([0x357F34]));
    }

    /**
     * uuid d5f3f3c3-e0f1-4e7f-aad0-18a44f223d1c
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> largest quadruple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesLargestQuadrupleByte(): void
    {
        $this->assertEquals([0xFF, 0xFF, 0xFF, 0x7F], vlq_encode([0x0FFFFFFF]));
    }

    /**
     * uuid 91a18b33-24e7-4bfb-bbca-eca78ff4fc47
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> smallest quintuple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesSmallestQuintupleByte(): void
    {
        $this->assertEquals([0x81, 0x80, 0x80, 0x80, 0x00], vlq_encode([0x10000000]));
    }

    /**
     * uuid 5f34ff12-2952-4669-95fe-2d11b693d331
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> arbitrary quintuple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesArbitraryQuintupleByte(): void
    {
        $this->assertEquals([0x8F, 0xF8, 0x80, 0x80, 0x00], vlq_encode([0xFF000000]));
    }

    /**
     * uuid 9be46731-7cd5-415c-b960-48061cbc1154
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> asymmetric quintuple byte')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesAsymmetricQuintupleByte(): void
    {
        $this->assertEquals([0x88, 0xB3, 0x95, 0xC2, 0x05], vlq_encode([0x8665C205]));
    }

    /**
     * uuid 7489694b-88c3-4078-9864-6fe802411009
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> maximum 32-bit integer input')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesMaximum32BitIntegerInput(): void
    {
        $this->assertEquals([0x8F, 0xFF, 0xFF, 0xFF, 0x7F], vlq_encode([0xFFFFFFFF]));
    }

    /**
     * uuid f9b91821-cada-4a73-9421-3c81d6ff3661
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> two single-byte values')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesTwoSingleByteValues(): void
    {
        $this->assertEquals([0x40, 0x7F], vlq_encode([0x40, 0x7F]));
    }

    /**
     * uuid 68694449-25d2-4974-ba75-fa7bb36db212
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> two multi-byte values')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesTwoMultiByteValues(): void
    {
        $this->assertEquals(
            [0x81, 0x80, 0x00, 0xC8, 0xE8, 0x56],
            vlq_encode([0x4000, 0x123456])
        );
    }

    /**
     * uuid 51a06b5c-de1b-4487-9a50-9db1b8930d85
     */
    #[TestDox('Encode a series of integers, producing a series of bytes. -> many multi-byte values')]
    public function testEncodeSeriesOfIntegersProducingSeriesOfBytesManyMultiByteValues(): void
    {
        $this->assertEquals(
            [
                0xC0, 0x00,
                0xC8, 0xE8, 0x56,
                0xFF, 0xFF, 0xFF, 0x7F,
                0x00,
                0xFF, 0x7F,
                0x81, 0x80, 0x00
            ],
            vlq_encode([0x2000, 0x123456, 0x0FFFFFFF, 0x00, 0x3FFF, 0x4000])
        );
    }

    /**
     * uuid baa73993-4514-4915-bac0-f7f585e0e59a
     */
    #[TestDox('Decode a series of bytes, producing a series of integers. -> one byte')]
    public function testDecodeSeriesOfBytesProducingSeriesOfIntegersOneByte(): void
    {
        $this->assertEquals([0x7F], vlq_decode([0x7F]));
    }

    /**
     * uuid 72e94369-29f9-46f2-8c95-6c5b7a595aee
     */
    #[TestDox('Decode a series of bytes, producing a series of integers. -> two bytes')]
    public function testDecodeSeriesOfBytesProducingSeriesOfIntegersTwoBytes(): void
    {
        $this->assertEquals([8192], vlq_decode([0xC0, 0x00]));
    }

    /**
     * uuid df5a44c4-56f7-464e-a997-1db5f63ce691
     */
    #[TestDox('Decode a series of bytes, producing a series of integers. -> three bytes')]
    public function testDecodeSeriesOfBytesProducingSeriesOfIntegersThreeBytes(): void
    {
        $this->assertEquals([2097151], vlq_decode([0xFF, 0xFF, 0x7F]));
    }

    /**
     * uuid 1bb58684-f2dc-450a-8406-1f3452aa1947
     */
    #[TestDox('Decode a series of bytes, producing a series of integers. -> four bytes')]
    public function testDecodeSeriesOfBytesProducingSeriesOfIntegersFourBytes(): void
    {
        $this->assertEquals([2097152], vlq_decode([0x81, 0x80, 0x80, 0x00]));
    }

    /**
     * uuid cecd5233-49f1-4dd1-a41a-9840a40f09cd
     */
    #[TestDox('Decode a series of bytes, producing a series of integers. -> maximum 32-bit integer')]
    public function testDecodeSeriesOfBytesProducingSeriesOfIntegersMaximum32BitInteger(): void
    {
        $this->assertEquals([4294967295], vlq_decode([0x8F, 0xFF, 0xFF, 0xFF, 0x7F]));
    }

    /**
     * uuid e7d74ba3-8b8e-4bcb-858d-d08302e15695
     */
    #[TestDox('Decode a series of bytes, producing a series of integers. -> incomplete sequence causes error')]
    public function testDecodeSeriesOfBytesProducingSeriesOfIntegersIncompleteSequenceCausesError(): void
    {
        $this->expectExceptionMessage('incomplete sequence');
        vlq_decode([0xFF]);
    }

    /**
     * uuid aa378291-9043-4724-bc53-aca1b4a3fcb6
     */
    #[TestDox('Decode a series of bytes, producing a series of integers. -> incomplete sequence causes error, even if value is zero')]
    public function testDecodeSeriesOfBytesProducingSeriesOfIntegersIncompleteSequenceZeroValue(): void
    {
        $this->expectExceptionMessage('incomplete sequence');
        vlq_decode([0x80]);
    }

    /**
     * uuid a91e6f5a-c64a-48e3-8a75-ce1a81e0ebee
     */
    #[TestDox('Decode a series of bytes, producing a series of integers. -> multiple values')]
    public function testDecodeSeriesOfBytesProducingSeriesOfIntegersMultipleValues(): void
    {
        $this->assertEquals(
            [8192, 1193046, 268435455, 0, 16383, 16384],
            vlq_decode([
                0xC0, 0x00,
                0xC8, 0xE8, 0x56,
                0xFF, 0xFF, 0xFF, 0x7F,
                0x00,
                0xFF, 0x7F,
                0x81, 0x80, 0x00
            ])
        );
    }
}
