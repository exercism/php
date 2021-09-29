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

class TournamentTest extends PHPUnit\Framework\TestCase
{
    private Tournament $tournament;

    public static function setUpBeforeClass(): void
    {
        require_once 'Tournament.php';
    }

    protected function setUp(): void
    {
        $this->tournament = new Tournament();
    }

    public function testHeaderOnlyNoTeams(): void
    {
        $scores   = '';
        $expected = 'Team                           | MP |  W |  D |  L |  P';
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testWinIsThreePointsLossIsZeroPoints(): void
    {
        $scores = 'Allegoric Alaskans;Blithering Badgers;win';
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  1 |  1 |  0 |  0 |  3\n" .
            "Blithering Badgers             |  1 |  0 |  0 |  1 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testWinCanAlsoBeExpressedAsALoss(): void
    {
        $scores = 'Blithering Badgers;Allegoric Alaskans;loss';
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  1 |  1 |  0 |  0 |  3\n" .
            "Blithering Badgers             |  1 |  0 |  0 |  1 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testDifferentTeamsCanWin(): void
    {
        $scores = 'Blithering Badgers;Allegoric Alaskans;win';
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Blithering Badgers             |  1 |  1 |  0 |  0 |  3\n" .
            "Allegoric Alaskans             |  1 |  0 |  0 |  1 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testADrawIsOnePointEach(): void
    {
        $scores = 'Allegoric Alaskans;Blithering Badgers;draw';
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  1 |  0 |  1 |  0 |  1\n" .
            "Blithering Badgers             |  1 |  0 |  1 |  0 |  1";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testThereCanBeMultipleMatches(): void
    {
        $scores =
            "Allegoric Alaskans;Blithering Badgers;win\n" .
            "Allegoric Alaskans;Blithering Badgers;win";
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  2 |  2 |  0 |  0 |  6\n" .
            "Blithering Badgers             |  2 |  0 |  0 |  2 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testThereCanBeMoreThanOneWinner(): void
    {
        $scores =
            "Allegoric Alaskans;Blithering Badgers;loss\n" .
            "Allegoric Alaskans;Blithering Badgers;win";
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  2 |  1 |  0 |  1 |  3\n" .
            "Blithering Badgers             |  2 |  1 |  0 |  1 |  3";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testThereCanBeMoreThanTwoTeams(): void
    {
        $scores =
            "Allegoric Alaskans;Blithering Badgers;win\n" .
            "Blithering Badgers;Courageous Californians;win\n" .
            "Courageous Californians;Allegoric Alaskans;loss";
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  2 |  2 |  0 |  0 |  6\n" .
            "Blithering Badgers             |  2 |  1 |  0 |  1 |  3\n" .
            "Courageous Californians        |  2 |  0 |  0 |  2 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testStandardInput(): void
    {
        $scores =
            "Allegoric Alaskans;Blithering Badgers;win\n" .
            "Devastating Donkeys;Courageous Californians;draw\n" .
            "Devastating Donkeys;Allegoric Alaskans;win\n" .
            "Courageous Californians;Blithering Badgers;loss\n" .
            "Blithering Badgers;Devastating Donkeys;loss\n" .
            "Allegoric Alaskans;Courageous Californians;win";
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Devastating Donkeys            |  3 |  2 |  1 |  0 |  7\n" .
            "Allegoric Alaskans             |  3 |  2 |  0 |  1 |  6\n" .
            "Blithering Badgers             |  3 |  1 |  0 |  2 |  3\n" .
            "Courageous Californians        |  3 |  0 |  1 |  2 |  1";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testIncompleteCompetitionWhereNotAllGamesPlayed(): void
    {
        $scores =
            "Allegoric Alaskans;Blithering Badgers;loss\n" .
            "Devastating Donkeys;Allegoric Alaskans;loss\n" .
            "Courageous Californians;Blithering Badgers;draw\n" .
            "Allegoric Alaskans;Courageous Californians;win";
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  3 |  2 |  0 |  1 |  6\n" .
            "Blithering Badgers             |  2 |  1 |  1 |  0 |  4\n" .
            "Courageous Californians        |  2 |  0 |  1 |  1 |  1\n" .
            "Devastating Donkeys            |  1 |  0 |  0 |  1 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    public function testTiesSortedAlphabetically(): void
    {
        $scores =
            "Courageous Californians;Devastating Donkeys;win\n" .
            "Allegoric Alaskans;Blithering Badgers;win\n" .
            "Devastating Donkeys;Allegoric Alaskans;loss\n" .
            "Courageous Californians;Blithering Badgers;win\n" .
            "Blithering Badgers;Devastating Donkeys;draw\n" .
            "Allegoric Alaskans;Courageous Californians;draw";
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  3 |  2 |  1 |  0 |  7\n" .
            "Courageous Californians        |  3 |  2 |  1 |  0 |  7\n" .
            "Blithering Badgers             |  3 |  0 |  1 |  2 |  1\n" .
            "Devastating Donkeys            |  3 |  0 |  1 |  2 |  1";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }
}
