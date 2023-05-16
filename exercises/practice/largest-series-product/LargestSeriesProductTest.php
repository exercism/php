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

class LargestSeriesProductTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'LargestSeriesProduct.php';
    }

    /**
     * Since PHP can only support Integers between +/- 9223372036854775807
     * We will deal with the series of digits as strings to avoid having them cast to floats.
     */

    public function testCanFindTheLargestProductOf2WithNumbersInOrder(): void
    {
        // The number starts with a 0, qualifying it to be an octal
        // So it needs to be a string so PHP doesn't complain
        $series = new Series("0123456789");
        $this->assertEquals(72, $series->largestProduct(2));
    }

    public function testCanFindTheLargestProductOf2(): void
    {
        $series = new Series("576802143");
        $this->assertEquals(48, $series->largestProduct(2));
    }

    public function testFindsTheLargestProductIfSpanEqualsLength(): void
    {
        $series = new Series("29");
        $this->assertEquals(18, $series->largestProduct(2));
    }

    public function testCanFindTheLargestProductOf3WithNumbersInOrder(): void
    {
        $series = new Series("123456789");
        $this->assertEquals(504, $series->largestProduct(3));
    }

    public function testCanFindTheLargestProductOf3(): void
    {
        $series = new Series("1027839564");
        $this->assertEquals(270, $series->largestProduct(3));
    }

    public function testCanFindTheLargestProductOf5WithNumbersInOrder(): void
    {
        $series = new Series("0123456789");
        $this->assertEquals(15120, $series->largestProduct(5));
    }

    public function testCanGetTheLargestProductOfABigNumber(): void
    {
        $series = new Series("73167176531330624919225119674426574742355349194934");
        $this->assertEquals(23520, $series->largestProduct(6));
    }

    public function testCanGetTheLargestProductOfABigNumberProjectEuler(): void
    {
        $digits = "731671765313306249192251196744265747423553491949349698352031277450632623957831801698480186947"
            . "8851843858615607891129494954595017379583319528532088055111254069874715852386305071569329096"
            . "3295227443043557668966489504452445231617318564030987111217223831136222989342338030813533627"
            . "6614282806444486645238749303589072962904915604407723907138105158593079608667017242712188399"
            . "8797908792274921901699720888093776657273330010533678812202354218097512545405947522435258490"
            . "7711670556013604839586446706324415722155397536978179778461740649551492908625693219784686224"
            . "8283972241375657056057490261407972968652414535100474821663704844031998900088952434506585412"
            . "2758866688116427171479924442928230863465674813919123162824586178664583591245665294765456828"
            . "4891288314260769004224219022671055626321111109370544217506941658960408071984038509624554443"
            . "6298123098787992724428490918884580156166097919133875499200524063689912560717606058861164671"
            . "0940507754100225698315520005593572972571636269561882670428252483600823257530420752963450";

        $series = new Series($digits);
        $this->assertEquals(23514624000, $series->largestProduct(13));
    }

    public function testReportsZeroIfTheOnlyDigitsAreZero(): void
    {
        $series = new Series("0000");
        $this->assertEquals(0, $series->largestProduct(2));
    }

    public function testReportsZeroIfAllSpansIncludeZero(): void
    {
        $series = new Series("99099");
        $this->assertEquals(0, $series->largestProduct(3));
    }

    public function testRejectsSpanLongerThanStringLength(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $series = new Series("123");
        $series->largestProduct(4);
    }

    public function testRejectsEmptyStringAndNonzeroSpan(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $series = new Series("");
        $series->largestProduct(1);
    }

    public function testRejectsInvalidCharacterInDigits(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $series = new Series("1234a5");
        $series->largestProduct(2);
    }

    public function testRejectsNegativeSpan(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $series = new Series("12345");
        $series->largestProduct(-1);
    }
}
