<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class IntergalacticTransmissionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'IntergalacticTransmission.php';
    }

    /**
     * uuid: f99d4046-b429-4582-9324-f0bcac7ab51c
     */
    #[TestDox('Calculate transmit sequences -> Empty message')]
    public function testCalculateTransmitSequencesEmptyMessage(): void
    {
        $message  = [];
        $expected = [];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: ee27ea2d-8999-4f23-9275-8f6879545f86
     */
    #[TestDox('Calculate transmit sequences -> 0x00 is transmitted as 0x0000')]
    public function testCalculateTransmitSequences0x00IsTransmittedAs0x0000(): void
    {
        $message  = ["0x00"];
        $expected = ["0x00", "0x00"];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: 97f27f98-8020-402d-be85-f21ba54a6df0
     */
    #[TestDox('Calculate transmit sequences -> 0x02 is transmitted as 0x0300')]
    public function testCalculateTransmitSequences0x02IsTransmittedAs0x0300(): void
    {
        $message  = ["0x02"];
        $expected = ["0x03", "0x00"];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: 24712fb9-0336-4e2f-835e-d2350f29c420
     */
    #[TestDox('Calculate transmit sequences -> 0x06 is transmitted as 0x0600')]
    public function testCalculateTransmitSequences0x06IsTransmittedAs0x0600(): void
    {
        $message  = ["0x06"];
        $expected = ["0x06", "0x00"];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: 7630b5a9-dba1-4178-b2a0-4a376f7414e0
     */
    #[TestDox('Calculate transmit sequences -> 0x05 is transmitted as 0x0581')]
    public function testCalculateTransmitSequences0x05IsTransmittedAs0x0581(): void
    {
        $message  = ["0x05"];
        $expected = ["0x05", "0x81"];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: ab4fe80b-ef8e-4a99-b4fb-001937af415d
     */
    #[TestDox('Calculate transmit sequences -> 0x29 is transmitted as 0x2881')]
    public function testCalculateTransmitSequences0x29IsTransmittedAs0x2881(): void
    {
        $message  = ["0x29"];
        $expected = ["0x28", "0x81"];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: 4e200d84-593b-4449-b7c0-4de1b6a0955e
     */
    #[TestDox('Calculate transmit sequences -> 0xc001c0de is transmitted as 0xc000711be1')]
    public function testCalculateTransmitSequences0xc001c0deIsTransmittedAs0xc000711be1(): void
    {
        $message  = ["0xc0", "0x01", "0xc0", "0xde"];
        $expected = ["0xc0", "0x00", "0x71", "0x1b", "0xe1"];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: fbc537e9-6b21-4f4a-8c2b-9cf9b702a9b7
     */
    #[TestDox('Calculate transmit sequences -> Six byte message')]
    public function testCalculateTransmitSequencesSixByteMessage(): void
    {
        $message  = ["0x47", "0x72", "0x65", "0x61", "0x74", "0x21"];
        $expected = ["0x47", "0xb8", "0x99", "0xac", "0x17", "0xa0", "0x84"];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: d5b75adf-b5fc-4f77-b4ab-77653e30f07c
     */
    #[TestDox('Calculate transmit sequences -> Seven byte message')]
    public function testCalculateTransmitSequencesSevenByteMessage(): void
    {
        $message  = ["0x47", "0x72", "0x65", "0x61", "0x74", "0x31", "0x21"];
        $expected = ["0x47", "0xb8", "0x99", "0xac", "0x17", "0xa0", "0xc5", "0x42"];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: 6d8b297b-da1d-435e-bcd7-55fbb1400e73
     */
    #[TestDox('Calculate transmit sequences -> Eight byte message')]
    public function testCalculateTransmitSequencesEightByteMessage(): void
    {
        $message = [
            "0xc0",
            "0x01",
            "0x13",
            "0x37",
            "0xc0",
            "0xde",
            "0x21",
            "0x21"
        ];
        $expected = [
            "0xc0",
            "0x00",
            "0x44",
            "0x66",
            "0x7d",
            "0x06",
            "0x78",
            "0x42",
            "0x21",
            "0x81"
        ];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: 54a0642a-d5aa-490c-be89-8e171a0cab6f
     */
    #[TestDox('Calculate transmit sequences -> Twenty byte message')]
    public function testCalculateTransmitSequencesTwentyByteMessage(): void
    {
        $message = [
            "0x45",
            "0x78",
            "0x65",
            "0x72",
            "0x63",
            "0x69",
            "0x73",
            "0x6d",
            "0x20",
            "0x69",
            "0x73",
            "0x20",
            "0x61",
            "0x77",
            "0x65",
            "0x73",
            "0x6f",
            "0x6d",
            "0x65",
            "0x21"
        ];
        $expected = [
            "0x44",
            "0xbd",
            "0x18",
            "0xaf",
            "0x27",
            "0x1b",
            "0xa5",
            "0xe7",
            "0x6c",
            "0x90",
            "0x1b",
            "0x2e",
            "0x33",
            "0x03",
            "0x84",
            "0xee",
            "0x65",
            "0xb8",
            "0xdb",
            "0xed",
            "0xd7",
            "0x28",
            "0x84"
        ];
        $this->assertEquals($expected, transmitSequence($message));
    }

    /**
     * uuid: 9a8084dd-3336-474c-90cb-8a852524604d
     */
    #[TestDox('Decode received messages -> Empty message')]
    public function testDecodeReceivedMessagesEmptyMessage(): void
    {
        $message  = [];
        $expected = [];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 879af739-0094-4736-9127-bd441b1ddbbf
     */
    #[TestDox('Decode received messages -> Zero message')]
    public function testDecodeReceivedMessagesZeroMessage(): void
    {
        $message  = ["0x00", "0x00"];
        $expected = ["0x00"];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 7a89eeef-96c5-4329-a246-ec181a8e959a
     */
    #[TestDox('Decode received messages -> 0x0300 is decoded to 0x02')]
    public function testDecodeReceivedMessages0x0300IsDecodedTo0x02(): void
    {
        $message  = ["0x03", "0x00"];
        $expected = ["0x02"];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 3e515af7-8b62-417f-960c-3454bca7f806
     */
    #[TestDox('Decode received messages -> 0x0581 is decoded to 0x05')]
    public function testDecodeReceivedMessages0x0581IsDecodedTo0x05(): void
    {
        $message  = ["0x05", "0x81"];
        $expected = ["0x05"];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: a1b4a3f7-9f05-4b7a-b86e-d7c6fc3f16a9
     */
    #[TestDox('Decode received messages -> 0x2881 is decoded to 0x29')]
    public function testDecodeReceivedMessages0x2881IsDecodedTo0x29(): void
    {
        $message  = ["0x28", "0x81"];
        $expected = ["0x29"];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 2e99d617-4c91-4ad5-9217-e4b2447d6e4a
     */
    #[TestDox('Decode received messages -> First byte has wrong parity')]
    public function testDecodeReceivedMessagesFirstByteHasWrongParity(): void
    {
        $message = ["0x07", "0x00"];
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/wrong parity/');
        decodeMessage($message);
    }

    /**
     * uuid: 507e212d-3dae-42e8-88b4-2223838ff8d2
     */
    #[TestDox('Decode received messages -> Second byte has wrong parity')]
    public function testDecodeReceivedMessagesSecondByteHasWrongParity(): void
    {
        $message = ["0x03", "0x68"];
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/wrong parity/');
        decodeMessage($message);
    }

    /**
     * uuid: b985692e-6338-46c7-8cea-bc38996d4dfd
     */
    #[TestDox('Decode received messages -> 0xcf4b00 is decoded to 0xce94')]
    public function testDecodeReceivedMessages0xcf4b00IsDecodedTo0xce94(): void
    {
        $message  = ["0xcf", "0x4b", "0x00"];
        $expected = ["0xce", "0x94"];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 7a1f4d48-696d-4679-917c-21b7da3ff3fd
     */
    #[TestDox('Decode received messages -> 0xe2566500 is decoded to 0xe2ad90')]
    public function testDecodeReceivedMessages0xe2566500IsDecodedTo0xe2ad90(): void
    {
        $message  = ["0xe2", "0x56", "0x65", "0x00"];
        $expected = ["0xe2", "0xad", "0x90"];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 467549dc-a558-443b-80c5-ff3d4eb305d4
     */
    #[TestDox('Decode received messages -> Six byte message')]
    public function testDecodeReceivedMessagesSixByteMessage(): void
    {
        $message  = ["0x47", "0xb8", "0x99", "0xac", "0x17", "0xa0", "0x84"];
        $expected = ["0x47", "0x72", "0x65", "0x61", "0x74", "0x21"];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 1f3be5fb-093a-4661-9951-c1c4781c71ea
     */
    #[TestDox('Decode received messages -> Seven byte message')]
    public function testDecodeReceivedMessagesSevenByteMessage(): void
    {
        $message  = ["0x47", "0xb8", "0x99", "0xac", "0x17", "0xa0", "0xc5", "0x42"];
        $expected = ["0x47", "0x72", "0x65", "0x61", "0x74", "0x31", "0x21"];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 6065b8b3-9dcd-45c9-918c-b427cfdb28c1
     */
    #[TestDox('Decode received messages -> Last byte has wrong parity')]
    public function testDecodeReceivedMessagesLastByteHasWrongParity(): void
    {
        $message = ["0x47", "0xb8", "0x99", "0xac", "0x17", "0xa0", "0xc5", "0x43"];
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/wrong parity/');
        decodeMessage($message);
    }

    /**
     * uuid: 98af97b7-9cca-4c4c-9de3-f70e227a4cb1
     */
    #[TestDox('Decode received messages -> Eight byte message')]
    public function testDecodeReceivedMessagesEightByteMessage(): void
    {
        $message = [
            "0xc0",
            "0x00",
            "0x44",
            "0x66",
            "0x7d",
            "0x06",
            "0x78",
            "0x42",
            "0x21",
            "0x81"
        ];
        $expected = [
            "0xc0",
            "0x01",
            "0x13",
            "0x37",
            "0xc0",
            "0xde",
            "0x21",
            "0x21"
        ];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: aa7d4785-2bb9-43a4-a38a-203325c464fb
     */
    #[TestDox('Decode received messages -> Twenty byte message')]
    public function testDecodeReceivedMessagesTwentyByteMessage(): void
    {
        $message = [
            "0x44",
            "0xbd",
            "0x18",
            "0xaf",
            "0x27",
            "0x1b",
            "0xa5",
            "0xe7",
            "0x6c",
            "0x90",
            "0x1b",
            "0x2e",
            "0x33",
            "0x03",
            "0x84",
            "0xee",
            "0x65",
            "0xb8",
            "0xdb",
            "0xed",
            "0xd7",
            "0x28",
            "0x84"
        ];
        $expected = [
            "0x45",
            "0x78",
            "0x65",
            "0x72",
            "0x63",
            "0x69",
            "0x73",
            "0x6d",
            "0x20",
            "0x69",
            "0x73",
            "0x20",
            "0x61",
            "0x77",
            "0x65",
            "0x73",
            "0x6f",
            "0x6d",
            "0x65",
            "0x21"
        ];
        $this->assertEquals($expected, decodeMessage($message));
    }

    /**
     * uuid: 4c86e034-b066-42ac-8497-48f9bc1723c1
     */
    #[TestDox('Decode received messages -> Wrong parity on 16th byte')]
    public function testDecodeReceivedMessagesWrongParityOn16thByte(): void
    {
        $message = [
            "0x44",
            "0xbd",
            "0x18",
            "0xaf",
            "0x27",
            "0x1b",
            "0xa5",
            "0xe7",
            "0x6c",
            "0x90",
            "0x1b",
            "0x2e",
            "0x33",
            "0x03",
            "0x84",
            "0xef",
            "0x65",
            "0xb8",
            "0xdb",
            "0xed",
            "0xd7",
            "0x28",
            "0x84"
        ];
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/wrong parity/');
        decodeMessage($message);
    }
}
