<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class TwelveDaysTest extends TestCase
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

    /**
     * uuid c0b5a5e6-c89d-49b1-a6b2-9f523bff33f7
     */
    #[TestDox('verse -> first day a partridge in a pear tree')]
    public function testVerseFirstDayAPartridgeInAPearTree(): void
    {
        $expected = "On the first day of Christmas my true love gave to me: a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(1, 1));
    }

    /**
     * uuid 1c64508a-df3d-420a-b8e1-fe408847854a
     */
    #[TestDox('verse -> second day two turtle doves')]
    public function testVerseSecondDayTwoTurtleDoves(): void
    {
        $expected =
            "On the second day of Christmas my true love gave to me: two Turtle Doves, " .
            "and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(2, 2));
    }

    /**
     * uuid a919e09c-75b2-4e64-bb23-de4a692060a8
     */
    #[TestDox('verse -> third day three french hens')]
    public function testVerseThirdDayThreeFrenchHens(): void
    {
        $expected =
            "On the third day of Christmas my true love gave to me: three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(3, 3));
    }

    /**
     * uuid 9bed8631-ec60-4894-a3bb-4f0ec9fbe68d
     */
    #[TestDox('verse -> fourth day four calling birds')]
    public function testVerseFourthDayFourCallingBirds(): void
    {
        $expected =
            "On the fourth day of Christmas my true love gave to me: four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(4, 4));
    }

    /**
     * uuid cf1024f0-73b6-4545-be57-e9cea565289a
     */
    #[TestDox('verse -> fifth day five gold rings')]
    public function testVerseFifthDayFiveGoldRings(): void
    {
        $expected =
            "On the fifth day of Christmas my true love gave to me: five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(5, 5));
    }

    /**
     * uuid 50bd3393-868a-4f24-a618-68df3d02ff04
     */
    #[TestDox('verse -> sixth day six geese-a-laying')]
    public function testVerseSixthDaySixGeeseALaying(): void
    {
        $expected =
            "On the sixth day of Christmas my true love gave to me: six Geese-a-Laying, five Gold Rings, " .
            "four Calling Birds, three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(6, 6));
    }

    /**
     * uuid 8f29638c-9bf1-4680-94be-e8b84e4ade83
     */
    #[TestDox('verse -> seventh day seven swans-a-swimming')]
    public function testVerseSeventhDaySevenSwansASwimming(): void
    {
        $expected =
            "On the seventh day of Christmas my true love gave to me: seven Swans-a-Swimming, " .
            "six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(7, 7));
    }

    /**
     * uuid 7038d6e1-e377-47ad-8c37-10670a05bc05
     */
    #[TestDox('verse -> eighth day eight maids-a-milking')]
    public function testVerseEightDayEightMaidsAMilking(): void
    {
        $expected =
            "On the eighth day of Christmas my true love gave to me: eight Maids-a-Milking, " .
            "seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(8, 8));
    }

    /**
     * uuid 37a800a6-7a56-4352-8d72-0f51eb37cfe8
     */
    #[TestDox('verse -> ninth day nine ladies dancing')]
    public function testVerseNinthDayNineLadiesDancing(): void
    {
        $expected =
            "On the ninth day of Christmas my true love gave to me: nine Ladies Dancing, " .
            "eight Maids-a-Milking, seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(9, 9));
    }

    /**
     * uuid 10b158aa-49ff-4b2d-afc3-13af9133510d
     */
    #[TestDox('verse -> tenth day ten lords-a-leaping')]
    public function testVerseTenthDayTenLordsALeaping(): void
    {
        $expected =
            "On the tenth day of Christmas my true love gave to me: ten Lords-a-Leaping, " .
            "nine Ladies Dancing, eight Maids-a-Milking, seven Swans-a-Swimming, six Geese-a-Laying, " .
            "five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(10, 10));
    }

    /**
     * uuid 08d7d453-f2ba-478d-8df0-d39ea6a4f457
     */
    #[TestDox('verse -> eleventh day eleven pipers piping')]
    public function testVerseEleventhDayElevenPipersPiping(): void
    {
        $expected =
            "On the eleventh day of Christmas my true love gave to me: eleven Pipers Piping, " .
            "ten Lords-a-Leaping, nine Ladies Dancing, eight Maids-a-Milking, seven Swans-a-Swimming, " .
            "six Geese-a-Laying, five Gold Rings, four Calling Birds, " .
            "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(11, 11));
    }

    /**
     * uuid 0620fea7-1704-4e48-b557-c05bf43967f0
     */
    #[TestDox('verse -> twelfth day twelve drummers drumming')]
    public function testVerseTwelfthDayTwelveDrummersDrumming(): void
    {
        $expected =
            "On the twelfth day of Christmas my true love gave to me: twelve Drummers Drumming, " .
            "eleven Pipers Piping, ten Lords-a-Leaping, nine Ladies Dancing, eight Maids-a-Milking, " .
            "seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, " .
            "two Turtle Doves, and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(12, 12));
    }

    /**
     * uuid da8b9013-b1e8-49df-b6ef-ddec0219e398
     */
    #[TestDox('lyrics -> recites first three verses of the song')]
    public function testLyricsRecitesFirstThreeVersesOfSong(): void
    {
        $expected =
            "On the first day of Christmas my true love gave to me: a Partridge in a Pear Tree." . PHP_EOL .
            "On the second day of Christmas my true love gave to me: two Turtle Doves, " .
            "and a Partridge in a Pear Tree." . PHP_EOL .
            "On the third day of Christmas my true love gave to me: three French Hens, two Turtle Doves, " .
            "and a Partridge in a Pear Tree.";
        $this->assertEquals($expected, $this->twelveDays->recite(1, 3));
    }

    /**
     * uuid c095af0d-3137-4653-ad32-bfb899eda24c
     */
    #[TestDox('lyrics -> recites three verses from the middle of the song')]
    public function testLyricesRecitesThreeVersesFromMiddleOfSong(): void
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

    /**
     * uuid 20921bc9-cc52-4627-80b3-198cbbfcf9b7
     */
    #[TestDox('lyrics -> recites the whole song')]
    public function testLyricsRecitesTheWholeSong(): void
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
