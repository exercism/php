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

class TwelveDaysTest extends PHPUnit\Framework\TestCase
{
    private TwelveDays $twelveDays;

    public static function setUpBeforeClass(): void
    {
        require_once 'TwelveDays.php';
    }

    public function setUp(): void
    {
        $this->twelveDays = new TwelveDays();
    }

    public function testFirstDayAPartridgeInAPearTree(): void
    {
        $expected = "On the first day of Christmas my true love gave to me: a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(1, 1));
    }

    public function testSecondDayTwoTurtleDoves(): void
    {
        $expected =
            "On the second day of Christmas my true love gave to me: two Turtle Doves, " .
            "and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(2, 2));
    }

    public function testThirdDayThreeFrenchHends(): void
    {
        $expected =
            "On the third day of Christmas my true love gave to me: three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(3, 3));
    }

    public function testFourthDayFourCallingBirds(): void
    {
        $expected =
            "On the fourth day of Christmas my true love gave to me: four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(4, 4));
    }

    public function testFifthDayFiveGoldRings(): void
    {
        $expected =
            "On the fifth day of Christmas my true love gave to me: five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(5, 5));
    }

    public function testSixthDaySixGeeseALaying(): void
    {
        $expected =
            "On the sixth day of Christmas my true love gave to me: six Geese-a-Laying, five Gold Rings, " .
            "four Calling Birds, three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(6, 6));
    }

    public function testSeventhDaySevenSwansASwimming(): void
    {
        $expected =
            "On the seventh day of Christmas my true love gave to me: seven Swans-a-Swimming, " .
            "six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(7, 7));
    }

    public function testEightDayEightMaidsAMilking(): void
    {
        $expected =
            "On the eighth day of Christmas my true love gave to me: eight Maids-a-Milking, " .
            "seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(8, 8));
    }

    public function testNinthDayNineLadiesDancing(): void
    {
        $expected =
            "On the ninth day of Christmas my true love gave to me: nine Ladies Dancing, " .
            "eight Maids-a-Milking, seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(9, 9));
    }

    public function testTenthDayTenLordsALeaping(): void
    {
        $expected =
            "On the tenth day of Christmas my true love gave to me: ten Lords-a-Leaping, " .
            "nine Ladies Dancing, eight Maids-a-Milking, seven Swans-a-Swimming, six Geese-a-Laying, " .
            "five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(10, 10));
    }

    public function testEleventhDayElevenPipersPiping(): void
    {
        $expected =
            "On the eleventh day of Christmas my true love gave to me: eleven Pipers Piping, " .
            "ten Lords-a-Leaping, nine Ladies Dancing, eight Maids-a-Milking, seven Swans-a-Swimming, " .
            "six Geese-a-Laying, five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(11, 11));
    }

    public function testTwelfthDayTwelveDrummersDrumming(): void
    {
        $expected =
            "On the twelfth day of Christmas my true love gave to me: twelve Drummers Drumming, " .
            "eleven Pipers Piping, ten Lords-a-Leaping, nine Ladies Dancing, eight Maids-a-Milking, " .
            "seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(12, 12));
    }

    public function testRecitesFirstThreeVersesOfSong(): void
    {
        $expected =
            "On the first day of Christmas my true love gave to me: a Partridge in a Pear Tree." . PHP_EOL .
            "On the second day of Christmas my true love gave to me: two Turtle Doves, " .
            "and a Partridge in a Pear Tree." . PHP_EOL .
            "On the third day of Christmas my true love gave to me: three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(1, 3));
    }

    public function testRecitesVersesFourThroughSixOfSong(): void
    {
        $expected =
            "On the fourth day of Christmas my true love gave to me: four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree." . PHP_EOL .
            "On the fifth day of Christmas my true love gave to me: five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree." . PHP_EOL .
            "On the sixth day of Christmas my true love gave to me: six Geese-a-Laying, five Gold Rings, " .
            "four Calling Birds, three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(4, 6));
    }

    public function testRecitesEntireSong(): void
    {
        $expected =
            "On the first day of Christmas my true love gave to me: a Partridge in a Pear Tree." . PHP_EOL .
            "On the second day of Christmas my true love gave to me: two Turtle Doves, " .
            "and a Partridge in a Pear Tree." . PHP_EOL .
            "On the third day of Christmas my true love gave to me: three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree." . PHP_EOL .
            "On the fourth day of Christmas my true love gave to me: four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree." . PHP_EOL .
            "On the fifth day of Christmas my true love gave to me: five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree." . PHP_EOL .
            "On the sixth day of Christmas my true love gave to me: six Geese-a-Laying, five Gold Rings, " .
            "four Calling Birds, three French Hens, two Turtle Doves, and a Partridge in a Pear Tree." . PHP_EOL .
            "On the seventh day of Christmas my true love gave to me: seven Swans-a-Swimming, six Geese-a-Laying, " .
            "five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree." . PHP_EOL .
            "On the eighth day of Christmas my true love gave to me: eight Maids-a-Milking, seven Swans-a-Swimming, " .
            "six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree." . PHP_EOL .
            "On the ninth day of Christmas my true love gave to me: nine Ladies Dancing, eight Maids-a-Milking, " .
            "seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree." . PHP_EOL .
            "On the tenth day of Christmas my true love gave to me: ten Lords-a-Leaping, nine Ladies Dancing, " .
            "eight Maids-a-Milking, seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree." . PHP_EOL .
            "On the eleventh day of Christmas my true love gave to me: eleven Pipers Piping, ten Lords-a-Leaping, " .
            "nine Ladies Dancing, eight Maids-a-Milking, seven Swans-a-Swimming, six Geese-a-Laying, " .
            "five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree." . PHP_EOL .
            "On the twelfth day of Christmas my true love gave to me: twelve Drummers Drumming, " .
            "eleven Pipers Piping, ten Lords-a-Leaping, nine Ladies Dancing, eight Maids-a-Milking, " .
            "seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(1, 12));
    }
}
