<?php

declare(strict_types=1);

class AtbashCipherTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'AtbashCipher.php';
    }

    /**
     * Encoding from English to atbash cipher
     */

    /**
     * uuid 2f47ebe1-eab9-4d6b-b3c6-627562a31c77
     * @testdox encode yes
     */
    public function testEncodeYes(): void
    {
        $this->assertEquals('bvh', encode('yes'));
    }

    /**
     * uuid b4ffe781-ea81-4b74-b268-cc58ba21c739
     * @testdox encode no
     */
    public function testEncodeNo(): void
    {
        $this->assertEquals('ml', encode('no'));
    }

    /**
     * uuid 10e48927-24ab-4c4d-9d3f-3067724ace00
     * @testdox encode OMG
     */
    public function testEncodeOmg(): void
    {
        $this->assertEquals('lnt', encode('OMG'));
    }

    /**
     * uuid d59b8bc3-509a-4a9a-834c-6f501b98750b
     * @testdox encode spaces
     */
    public function testEncodeOmgWithSpaces(): void
    {
        $this->assertEquals('lnt', encode('O M G'));
    }

    /**
     * uuid 31d44b11-81b7-4a94-8b43-4af6a2449429
     * @testdox encode mindblowingly
     */
    public function testEncodeLongWord(): void
    {
        $this->assertEquals('nrmwy oldrm tob', encode('mindblowingly'));
    }

    /**
     * uuid d503361a-1433-48c0-aae0-d41b5baa33ff
     * @testdox encode numbers
     */
    public function testEncodeNumbers(): void
    {
        $this->assertEquals('gvhgr mt123 gvhgr mt', encode('Testing, 1 2 3, testing.'));
    }

    /**
     * uuid 79c8a2d5-0772-42d4-b41b-531d0b5da926
     * @testdox encode deep thought
     */
    public function testEncodeSentence(): void
    {
        $this->assertEquals('gifgs rhurx grlm', encode('Truth is fiction.'));
    }

    /**
     * uuid 9ca13d23-d32a-4967-a1fd-6100b8742bab
     * @testdox encode all the letters
     */
    public function testEncodeAllTheThings(): void
    {
        $plaintext = 'The quick brown fox jumps over the lazy dog.';
        $encoded = 'gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt';
        $this->assertEquals($encoded, encode($plaintext));
    }

    /**
     * Decoding from atbash cipher to all-lowercase-mashed-together English
     */

    /**
     * uuid bb50e087-7fdf-48e7-9223-284fe7e69851
     * @testdox decode exercism
     */
    public function testDecodeExercism(): void
    {
        $this->assertEquals('exercism', decode('vcvix rhn'));
    }

    /**
     * uuid ac021097-cd5d-4717-8907-b0814b9e292c
     * @testdox decode a sentence
     */
    public function testDecodeASentence(): void
    {
        $this->assertEquals(
            'anobstacleisoftenasteppingstone',
            decode('zmlyh gzxov rhlug vmzhg vkkrm thglm v')
        );
    }

    /**
     * uuid 18729de3-de74-49b8-b68c-025eaf77f851
     * @testdox decode numbers
     */
    public function testDecodeNumbers(): void
    {
        $this->assertEquals(
            "testing123testing",
            decode('gvhgr mt123 gvhgr mt')
        );
    }

    /**
     * uuid 0f30325f-f53b-415d-ad3e-a7a4f63de034
     * @testdox decode all the letters
     */
    public function testDecodeAllTheLetters(): void
    {
        $this->assertEquals(
            "thequickbrownfoxjumpsoverthelazydog",
            decode('gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt')
        );
    }

    /**
     * uuid 39640287-30c6-4c8c-9bac-9d613d1a5674
     * @testdox decode with too many spaces
     */
    public function testDecodeWithTooManySpaces(): void
    {
        $this->assertEquals(
            'exercism',
            decode('vc vix    r hn')
        );
    }

    /**
     * uuid b34edf13-34c0-49b5-aa21-0768928000d5
     * @testdox decode with no spaces
     */
    public function testDecodeWithNoSpacesInInput(): void
    {
        $this->assertEquals(
            'anobstacleisoftenasteppingstone',
            decode('zmlyhgzxovrhlugvmzhgvkkrmthglmv')
        );
    }
}
