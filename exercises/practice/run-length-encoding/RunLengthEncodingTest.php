<?php

declare(strict_types=1);

class RunLengthEncodingTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RunLengthEncoding.php';
    }

    /**
     * uuid: ad53b61b-6ffc-422f-81a6-61f7df92a231
     * @testdox Run-length encode a string - empty string
     */
    public function testEncodeEmptyString(): void
    {
        $this->assertEquals(
            '',
            encode('')
        );
    }

    /**
     * uuid: 52012823-b7e6-4277-893c-5b96d42f82de
     * @testdox Run-length encode a string - single characters only are encoded without count
     */
    public function testEncodeSingleCharactersOnlyAreEncodedWithoutCount(): void
    {
        $this->assertEquals(
            'XYZ',
            encode('XYZ')
        );
    }

    /**
     * uuid: b7868492-7e3a-415f-8da3-d88f51f80409
     * @testdox Run-length encode a string - string with no single characters
     */
    public function testEncodeStringWithNoSingleCharacters(): void
    {
        $this->assertEquals(
            '2A3B4C',
            encode('AABBBCCCC')
        );
    }

    /**
     * uuid: 859b822b-6e9f-44d6-9c46-6091ee6ae358
     * @testdox Run-length encode a string - single characters mixed with repeated characters
     */
    public function testEncodeSingleCharactersMixedWithRepeatedCharacters(): void
    {
        $this->assertEquals(
            '12WB12W3B24WB',
            encode('WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB')
        );
    }

    /**
     * uuid: 1b34de62-e152-47be-bc88-469746df63b3
     * @testdox Run-length encode a string - multiple whitespace mixed in string
     */
    public function testEncodeMultipleWhitespaceMixedInString(): void
    {
        $this->assertEquals(
            '2 hs2q q2w2 ',
            encode('  hsqq qww  ')
        );
    }

    /**
     * uuid: abf176e2-3fbd-40ad-bb2f-2dd6d4df721a
     * @testdox Run-length encode a string - lowercase characters
     */
    public function testEncodeLowercaseCharacters(): void
    {
        $this->assertEquals(
            '2a3b4c',
            encode('aabbbcccc')
        );
    }

    /**
     * uuid: 7ec5c390-f03c-4acf-ac29-5f65861cdeb5
     * @testdox Run-length decode a string - empty string
     */
    public function testDecodeEmptyString(): void
    {
        $this->assertEquals(
            '',
            decode('')
        );
    }

    /**
     * uuid: ad23f455-1ac2-4b0e-87d0-b85b10696098
     * @testdox Run-length decode a string - single characters only
     */
    public function testDecodeSingleCharactersOnly(): void
    {
        $this->assertEquals(
            'XYZ',
            decode('XYZ')
        );
    }
    /**
     * uuid: 21e37583-5a20-4a0e-826c-3dee2c375f54
     * @testdox Run-length decode a string - string with no single characters
     */
    public function testDecodeStringWithNoSingleCharacters(): void
    {
        $this->assertEquals(
            'AABBBCCCC',
            decode('2A3B4C')
        );
    }
    /**
     * uuid: 1389ad09-c3a8-4813-9324-99363fba429c
     * @testdox Run-length decode a string - single characters with repeated characters
     */
    public function testDecodeSingleCharactersWithRepeatedCharacters(): void
    {
        $this->assertEquals(
            'WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB',
            decode('12WB12W3B24WB')
        );
    }
    /**
     * uuid: 3f8e3c51-6aca-4670-b86c-a213bf4706b0
     * @testdox Run-length decode a string - multiple whitespace mixed in string
     */
    public function testDecodeMultipleWhitespaceMixedInString(): void
    {
        $this->assertEquals(
            '  hsqq qww  ',
            decode('2 hs2q q2w2 ')
        );
    }
    /**
     * uuid: 29f721de-9aad-435f-ba37-7662df4fb551
     * @testdox Run-length decode a string - lowercase string
     */
    public function testDecodeLowercaseString(): void
    {
        $this->assertEquals(
            'aabbbcccc',
            decode('2a3b4c')
        );
    }
    /**
     * uuid: 2a762efd-8695-4e04-b0d6-9736899fbc16
     * @testdox encode followed by decode gives original string
     */
    public function testEncodeFollowedByDecodeGivesOriginalString(): void
    {
        $this->assertEquals(
            'zzz ZZ  zZ',
            decode(encode('zzz ZZ  zZ'))
        );
    }
}
