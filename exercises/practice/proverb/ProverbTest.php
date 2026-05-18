<?php

use PHPUnit\Framework\TestCase;

class ProverbTest extends TestCase
{
    private Proverb $proverb;

    public static function setUpBeforeClass(): void
    {
        require_once 'Proverb.php';
    }

    public function setUp(): void
    {
        $this->proverb = new Proverb();
    }

    /** @uuid e974b73e-7851-484f-8d6d-92e07fe742fc */
    #[TestDox('zero pieces')]
    public function testNoVerses(): void
    {
        $pieces   = [];
        $expected = [];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }

    /** @uuid 2fcd5f5e-8b82-4e74-b51d-df28a5e0faa4 */
    #[TestDox('one piece')]
    public function testOneVerse(): void
    {
        $pieces   = ['nail'];
        $expected = ['And all for the want of a nail.'];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }

    /** @uuid d9d0a8a1-d933-46e2-aa94-eecf679f4b0e */
    #[TestDox('two pieces')]
    public function testTwoVerses(): void
    {
        $pieces   = ['nail', 'shoe'];
        $expected = ['For want of a nail the shoe was lost.', 'And all for the want of a nail.'];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }

    /** @uuid c95ef757-5e94-4f0d-a6cb-d2083f5e5a83 */
    #[TestDox('three pieces')]
    public function testThreeVerses(): void
    {
        $pieces   = ['nail', 'shoe', 'horse'];
        $expected = [
            'For want of a nail the shoe was lost.',
            'For want of a shoe the horse was lost.',
            'And all for the want of a nail.'
        ];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }

    /** @uuid 433fb91c-35a2-4d41-aeab-4de1e82b2126 */
    #[TestDox('full proverb')]
    public function testFullProverb(): void
    {
        $pieces   = ['nail', 'shoe', 'horse', 'rider', 'message', 'battle', 'kingdom'];
        $expected = [
            'For want of a nail the shoe was lost.',
            'For want of a shoe the horse was lost.',
            'For want of a horse the rider was lost.',
            'For want of a rider the message was lost.',
            'For want of a message the battle was lost.',
            'For want of a battle the kingdom was lost.',
            'And all for the want of a nail.'
        ];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }

    /** @uuid c1eefa5a-e8d9-41c7-91d4-99fab6d6b9f7 */
    #[TestDox('four pieces modernized')]
    public function testFourModernizedVerses(): void
    {
        $pieces   = ['pin', 'gun', 'soldier', 'battle'];
        $expected = [
            'For want of a pin the gun was lost.',
            'For want of a gun the soldier was lost.',
            'For want of a soldier the battle was lost.',
            'And all for the want of a pin.'
        ];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }
}
