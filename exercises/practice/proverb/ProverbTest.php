<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class ProverbTest extends PHPUnit\Framework\TestCase
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

    public function testNoVerses(): void
    {
        $pieces   = [];
        $expected = [];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }

    public function testOneVerse(): void
    {
        $pieces   = ['nail'];
        $expected = ['And all for the want of a nail.'];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }

    public function testTwoVerses(): void
    {
        $pieces   = ['nail', 'shoe'];
        $expected = ['For want of a nail the shoe was lost.', 'And all for the want of a nail.'];
        $this->assertEquals($expected, $this->proverb->recite($pieces));
    }

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
