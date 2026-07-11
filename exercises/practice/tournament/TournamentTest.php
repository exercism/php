<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class TournamentTest extends TestCase
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

    /**
     * uuid: 67e9fab1-07c1-49cf-9159-bc8671cc7c9c
     */
    #[TestDox('Just the header if no input')]
    public function testJustTheHeaderIfNoInput(): void
    {
        $scores   = '';
        $expected = 'Team                           | MP |  W |  D |  L |  P';
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    /**
     * uuid: 1b4a8aef-0734-4007-80a2-0626178c88f4
     */
    #[TestDox('A win is three points, a loss is zero points')]
    public function testAWinIsThreePointsALossIsZeroPoints(): void
    {
        $scores = 'Allegoric Alaskans;Blithering Badgers;win';
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  1 |  1 |  0 |  0 |  3\n" .
            "Blithering Badgers             |  1 |  0 |  0 |  1 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    /**
     * uuid: 5f45ac09-4efe-46e7-8ddb-75ad85f86e05
     */
    #[TestDox('A win can also be expressed as a loss')]
    public function testAWinCanAlsoBeExpressedAsALoss(): void
    {
        $scores = 'Blithering Badgers;Allegoric Alaskans;loss';
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  1 |  1 |  0 |  0 |  3\n" .
            "Blithering Badgers             |  1 |  0 |  0 |  1 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    /**
     * uuid: fd297368-efa0-442d-9f37-dd3f9a437239
     */
    #[TestDox('A different team can win')]
    public function testADifferentTeamCanWin(): void
    {
        $scores = 'Blithering Badgers;Allegoric Alaskans;win';
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Blithering Badgers             |  1 |  1 |  0 |  0 |  3\n" .
            "Allegoric Alaskans             |  1 |  0 |  0 |  1 |  0";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    /**
     * uuid: 26c016f9-e753-4a93-94e9-842f7b4d70fc
     */
    #[TestDox('A draw is one point each')]
    public function testADrawIsOnePointEach(): void
    {
        $scores = 'Allegoric Alaskans;Blithering Badgers;draw';
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Allegoric Alaskans             |  1 |  0 |  1 |  0 |  1\n" .
            "Blithering Badgers             |  1 |  0 |  1 |  0 |  1";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }

    /**
     * uuid: 731204f6-4f34-4928-97eb-1c307ba83e62
     */
    #[TestDox('There can be more than one match')]
    public function testThereCanBeMoreThanOneMatch(): void
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

    /**
     * uuid: 49dc2463-42af-4ea6-95dc-f06cc5776adf
     */
    #[TestDox('There can be more than one winner')]
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

    /**
     * uuid: 6d930f33-435c-4e6f-9e2d-63fa85ce7dc7
     */
    #[TestDox('There can be more than two teams')]
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

    /**
     * uuid: 97022974-0c8a-4a50-8fe7-e36bdd8a5945
     */
    #[TestDox('Typical input')]
    public function testTypicalInput(): void
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

    /**
     * uuid: fe562f0d-ac0a-4c62-b9c9-44ee3236392b
     */
    #[TestDox('Incomplete competition (not all pairs have played)')]
    public function testIncompleteCompetitionNotAllPairsHavePlayed(): void
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

    /**
     * uuid: 3aa0386f-150b-4f99-90bb-5195e7b7d3b8
     */
    #[TestDox('Ties broken alphabetically')]
    public function testTiesBrokenAlphabetically(): void
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

    /**
     * uuid: f9e20931-8a65-442a-81f6-503c0205b17a
     */
    #[TestDox('Ensure points sorted numerically')]
    public function testEnsurePointsSortedNumerically(): void
    {
        $scores =
            "Devastating Donkeys;Blithering Badgers;win\n" .
            "Devastating Donkeys;Blithering Badgers;win\n" .
            "Devastating Donkeys;Blithering Badgers;win\n" .
            "Devastating Donkeys;Blithering Badgers;win\n" .
            "Blithering Badgers;Devastating Donkeys;win";
        $expected =
            "Team                           | MP |  W |  D |  L |  P\n" .
            "Devastating Donkeys            |  5 |  4 |  0 |  1 | 12\n" .
            "Blithering Badgers             |  5 |  1 |  0 |  4 |  3";
        $this->assertEquals($expected, $this->tournament->tally($scores));
    }
}
