<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class WordSearchTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Location.php';
        require_once 'Result.php';
        require_once 'WordSearch.php';
    }

    /**
     * uuid: b4057815-0d01-41f0-9119-6a91f54b2a0a
     */
    #[TestDox('Should accept an initial game grid and a target search word')]
    public function testShouldAcceptAnInitialGameGridAndATargetSearchWord(): void
    {
        $grid            = ["jefblpepre",];
        $expectedClojure = null;
        $wordSearch      = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
    }

    /**
     * uuid: 6b22bcc5-6cbf-4674-931b-d2edbff73132
     */
    #[TestDox('Should locate one word written left to right')]
    public function testShouldLocateOneWordWrittenLeftToRight(): void
    {
        $grid = ["clojurermt"];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 1),
            end: new Location(column: 7, row: 1),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
    }

    /**
     * uuid: ff462410-434b-442d-9bc3-3360c75f34a8
     */
    #[TestDox('Should locate the same word written left to right in a different position')]
    public function testShouldLocateTheSameWordWrittenLeftToRightInADifferentPosition(): void
    {
        $grid = ["mtclojurer"];
        $expectedClojure = new Result(
            start: new Location(column: 3, row: 1),
            end: new Location(column: 9, row: 1),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
    }

    /**
     * uuid: a02febae-6347-443e-b99c-ab0afb0b8fca
     */
    #[TestDox('Should locate a different left to right word')]
    public function testShouldLocateADifferentLeftToRightWord(): void
    {
        $grid = ["coffeelplx"];
        $expectedCoffee = new Result(
            start: new Location(column: 1, row: 1),
            end: new Location(column: 6, row: 1),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedCoffee, $wordSearch->search("coffee"));
    }

    /**
     * uuid: e42e9987-6304-4e13-8232-fa07d5280130
     */
    #[TestDox('Should locate that different left to right word in a different position')]
    public function testShouldLocateThatDifferentLeftToRightWordInADifferentPosition(): void
    {
        $grid = ["xcoffeezlp"];
        $expectedCoffee = new Result(
            start: new Location(column: 2, row: 1),
            end: new Location(column: 7, row: 1),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedCoffee, $wordSearch->search("coffee"));
    }

    /**
     * uuid: 9bff3cee-49b9-4775-bdfb-d55b43a70b2f
     */
    #[TestDox('Should locate a left to right word in two line grid')]
    public function testShouldLocateALeftToRightWordInTwoLineGrid(): void
    {
        $grid = ["jefblpepre", "tclojurerm"];
        $expectedClojure = new Result(
            start: new Location(column: 2, row: 2),
            end: new Location(column: 8, row: 2),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
    }

    /**
     * uuid: 851a35fb-f499-4ec1-9581-395a87903a22
     */
    #[TestDox('Should locate a left to right word in three line grid')]
    public function testShouldLocateALeftToRightWordInThreeLineGrid(): void
    {
        $grid = ["camdcimgtc", "jefblpepre", "clojurermt"];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 3),
            end: new Location(column: 7, row: 3),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
    }

    /**
     * uuid: 2f3dcf84-ba7d-4b75-8b8d-a3672b32c035
     */
    #[TestDox('Should locate a left to right word in ten line grid')]
    public function testShouldLocateALeftToRightWordInTenLineGrid(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
    }

    /**
     * uuid: 006d4856-f365-4e84-a18c-7d129ce9eefb
     */
    #[TestDox('Should locate that left to right word in a different position in a ten line grid')]
    public function testShouldLocateThatLeftToRightWordInADifferentPositionInATenLineGrid(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "clojurermt",
            "jalaycalmp"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 9),
            end: new Location(column: 7, row: 9),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
    }

    /**
     * uuid: eff7ac9f-ff11-443e-9747-40850c12ab60
     */
    #[TestDox('Should locate a different left to right word in a ten line grid')]
    public function testShouldLocateADifferentLeftToRightWordInATenLineGrid(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "fortranftw",
            "alxhpburyi",
            "clojurermt",
            "jalaycalmp"
          ];
        $expectedFortran = new Result(
            start: new Location(column: 1, row: 7),
            end: new Location(column: 7, row: 7),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedFortran, $wordSearch->search("fortran"));
    }

    /**
     * uuid: dea39f86-8c67-4164-8884-13bfc48bd13b
     */
    #[TestDox('Should locate multiple words')]
    public function testShouldLocateMultipleWords(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "fortranftw",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
          ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedFortran = new Result(
            start: new Location(column: 1, row: 7),
            end: new Location(column: 7, row: 7),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedFortran, $wordSearch->search("fortran"));
    }

    /**
     * uuid: 29e6a6a5-f80c-48a6-8e68-05bbbe187a09
     */
    #[TestDox('Should locate a single word written right to left')]
    public function testShouldLocateASingleWordWrittenRightToLeft(): void
    {
        $grid = ["rixilelhrs"];
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 1),
            end: new Location(column: 1, row: 1),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
    }

    /**
     * uuid: 3cf34428-b43f-48b6-b332-ea0b8836011d
     */
    #[TestDox('Should locate multiple words written in different horizontal directions')]
    public function testShouldLocateMultipleWordsWrittenInDifferentHorizontalDirections(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 5),
            end: new Location(column: 1, row: 5),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
    }

    /**
     * uuid: 2c8cd344-a02f-464b-93b6-8bf1bd890003
     */
    #[TestDox('Should locate words written top to bottom')]
    public function testShouldLocateWordsWrittenTopToBottom(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 5),
            end: new Location(column: 1, row: 5),
        );
        $expectedEcmascript = new Result(
            start: new Location(column: 10, row: 1),
            end: new Location(column: 10, row: 10),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
        $this->assertEquals($expectedEcmascript, $wordSearch->search("ecmascript"));
    }

    /**
     * uuid: 9ee1e43d-e59d-4c32-9a5f-6a22d4a1550f
     */
    #[TestDox('Should locate words written bottom to top')]
    public function testShouldLocateWordsWrittenBottomToTop(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 5),
            end: new Location(column: 1, row: 5),
        );
        $expectedEcmascript = new Result(
            start: new Location(column: 10, row: 1),
            end: new Location(column: 10, row: 10),
        );
        $expectedRust = new Result(
            start: new Location(column: 9, row: 5),
            end: new Location(column: 9, row: 2),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
        $this->assertEquals($expectedEcmascript, $wordSearch->search("ecmascript"));
        $this->assertEquals($expectedRust, $wordSearch->search("rust"));
    }

    /**
     * uuid: 6a21a676-f59e-4238-8e88-9f81015afae9
     */
    #[TestDox('Should locate words written top left to bottom right')]
    public function testShouldLocateWordsWrittenTopLeftToBottomRight(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 5),
            end: new Location(column: 1, row: 5),
        );
        $expectedEcmascript = new Result(
            start: new Location(column: 10, row: 1),
            end: new Location(column: 10, row: 10),
        );
        $expectedRust = new Result(
            start: new Location(column: 9, row: 5),
            end: new Location(column: 9, row: 2),
        );
        $expectedJava = new Result(
            start: new Location(column: 1, row: 1),
            end: new Location(column: 4, row: 4),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
        $this->assertEquals($expectedEcmascript, $wordSearch->search("ecmascript"));
        $this->assertEquals($expectedRust, $wordSearch->search("rust"));
        $this->assertEquals($expectedJava, $wordSearch->search("java"));
    }


    /**
     * uuid: c9125189-1861-4b0d-a14e-ba5dab29ca7c
     */
    #[TestDox('Should locate words written bottom right to top left')]
    public function testShouldLocateWordsWrittenBottomRightToTopLeft(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 5),
            end: new Location(column: 1, row: 5),
        );
        $expectedEcmascript = new Result(
            start: new Location(column: 10, row: 1),
            end: new Location(column: 10, row: 10),
        );
        $expectedRust = new Result(
            start: new Location(column: 9, row: 5),
            end: new Location(column: 9, row: 2),
        );
        $expectedJava = new Result(
            start: new Location(column: 1, row: 1),
            end: new Location(column: 4, row: 4),
        );
        $expectedLua = new Result(
            start: new Location(column: 8, row: 9),
            end: new Location(column: 6, row: 7),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
        $this->assertEquals($expectedEcmascript, $wordSearch->search("ecmascript"));
        $this->assertEquals($expectedRust, $wordSearch->search("rust"));
        $this->assertEquals($expectedJava, $wordSearch->search("java"));
        $this->assertEquals($expectedLua, $wordSearch->search("lua"));
    }

    /**
     * uuid: b19e2149-7fc5-41ec-a8a9-9bc6c6c38c40
     */
    #[TestDox('Should locate words written bottom left to top right')]
    public function testShouldLocateWordsWrittenBottomLeftToTopRight(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 5),
            end: new Location(column: 1, row: 5),
        );
        $expectedEcmascript = new Result(
            start: new Location(column: 10, row: 1),
            end: new Location(column: 10, row: 10),
        );
        $expectedRust = new Result(
            start: new Location(column: 9, row: 5),
            end: new Location(column: 9, row: 2),
        );
        $expectedJava = new Result(
            start: new Location(column: 1, row: 1),
            end: new Location(column: 4, row: 4),
        );
        $expectedLua = new Result(
            start: new Location(column: 8, row: 9),
            end: new Location(column: 6, row: 7),
        );
        $expectedLisp = new Result(
            start: new Location(column: 3, row: 6),
            end: new Location(column: 6, row: 3),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
        $this->assertEquals($expectedEcmascript, $wordSearch->search("ecmascript"));
        $this->assertEquals($expectedRust, $wordSearch->search("rust"));
        $this->assertEquals($expectedJava, $wordSearch->search("java"));
        $this->assertEquals($expectedLua, $wordSearch->search("lua"));
        $this->assertEquals($expectedLisp, $wordSearch->search("lisp"));
    }

    /**
     * uuid: 69e1d994-a6d7-4e24-9b5a-db76751c2ef8
     */
    #[TestDox('Should locate words written top right to bottom left')]
    public function testShouldLocateWordsWrittenTopRightToBottomLeft(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 5),
            end: new Location(column: 1, row: 5),
        );
        $expectedEcmascript = new Result(
            start: new Location(column: 10, row: 1),
            end: new Location(column: 10, row: 10),
        );
        $expectedRust = new Result(
            start: new Location(column: 9, row: 5),
            end: new Location(column: 9, row: 2),
        );
        $expectedJava = new Result(
            start: new Location(column: 1, row: 1),
            end: new Location(column: 4, row: 4),
        );
        $expectedLua = new Result(
            start: new Location(column: 8, row: 9),
            end: new Location(column: 6, row: 7),
        );
        $expectedLisp = new Result(
            start: new Location(column: 3, row: 6),
            end: new Location(column: 6, row: 3),
        );
        $expectedRuby = new Result(
            start: new Location(column: 8, row: 6),
            end: new Location(column: 5, row: 9),
        );
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
        $this->assertEquals($expectedEcmascript, $wordSearch->search("ecmascript"));
        $this->assertEquals($expectedRust, $wordSearch->search("rust"));
        $this->assertEquals($expectedJava, $wordSearch->search("java"));
        $this->assertEquals($expectedLua, $wordSearch->search("lua"));
        $this->assertEquals($expectedLisp, $wordSearch->search("lisp"));
        $this->assertEquals($expectedRuby, $wordSearch->search("ruby"));
    }

    /**
     * uuid: 695531db-69eb-463f-8bad-8de3bf5ef198
     */
    #[TestDox('Should fail to locate a word that is not in the puzzle')]
    public function testShouldFail(): void
    {
        $grid = [
            "jefblpepre",
            "camdcimgtc",
            "oivokprjsm",
            "pbwasqroua",
            "rixilelhrs",
            "wolcqlirpc",
            "screeaumgr",
            "alxhpburyi",
            "jalaycalmp",
            "clojurermt"
        ];
        $expectedClojure = new Result(
            start: new Location(column: 1, row: 10),
            end: new Location(column: 7, row: 10),
        );
        $expectedElixir = new Result(
            start: new Location(column: 6, row: 5),
            end: new Location(column: 1, row: 5),
        );
        $expectedEcmascript = new Result(
            start: new Location(column: 10, row: 1),
            end: new Location(column: 10, row: 10),
        );
        $expectedRust = new Result(
            start: new Location(column: 9, row: 5),
            end: new Location(column: 9, row: 2),
        );
        $expectedJava = new Result(
            start: new Location(column: 1, row: 1),
            end: new Location(column: 4, row: 4),
        );
        $expectedLua = new Result(
            start: new Location(column: 8, row: 9),
            end: new Location(column: 6, row: 7),
        );
        $expectedLisp = new Result(
            start: new Location(column: 3, row: 6),
            end: new Location(column: 6, row: 3),
        );
        $expectedRuby = new Result(
            start: new Location(column: 8, row: 6),
            end: new Location(column: 5, row: 9),
        );
        $expectedHaskell = null;
        $wordSearch = new WordSearch($grid);

        $this->assertEquals($expectedClojure, $wordSearch->search("clojure"));
        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
        $this->assertEquals($expectedEcmascript, $wordSearch->search("ecmascript"));
        $this->assertEquals($expectedRust, $wordSearch->search("rust"));
        $this->assertEquals($expectedJava, $wordSearch->search("java"));
        $this->assertEquals($expectedLua, $wordSearch->search("lua"));
        $this->assertEquals($expectedLisp, $wordSearch->search("lisp"));
        $this->assertEquals($expectedRuby, $wordSearch->search("ruby"));
        $this->assertEquals($expectedHaskell, $wordSearch->search("haskell"));
    }

    /**
     * uuid: fda5b937-6774-4a52-8f89-f64ed833b175
     */
    #[TestDox('Should fail to locate words that are not on horizontal, vertical, or diagonal lines')]
    public function testShouldFailToLocateWordsThatAreNotOnHorizontalVerticalOrDiagonalLines(): void
    {
        $grid        = ["abc", "def"];
        $expectedAef = null;
        $expectedCed = null;
        $expectedAbf = null;
        $expectedCbd = null;
        $wordSearch  = new WordSearch($grid);

        $this->assertEquals($expectedAef, $wordSearch->search("aef"));
        $this->assertEquals($expectedCed, $wordSearch->search("ced"));
        $this->assertEquals($expectedAbf, $wordSearch->search("abf"));
        $this->assertEquals($expectedCbd, $wordSearch->search("cbd"));
    }

    /**
     * uuid: 5b6198eb-2847-4e2f-8efe-65045df16bd3
     */
    #[TestDox('Should not concatenate different lines to find a horizontal word')]
    public function testShouldNotConcatenateDifferentLinesToFindAHorizontalWord(): void
    {
        $grid           = ["abceli", "xirdfg"];
        $expectedElixir = null;
        $wordSearch     = new WordSearch($grid);

        $this->assertEquals($expectedElixir, $wordSearch->search("elixir"));
    }

    /**
     * uuid: eba44139-a34f-4a92-98e1-bd5f259e5769
     */
    #[TestDox('Should not wrap around horizontally to find a word')]
    public function testShouldNotWrapAroundHorizontallyToFindAWord(): void
    {
        $grid         = ["silabcdefp"];
        $expectedLisp = null;
        $wordSearch   = new WordSearch($grid);

        $this->assertEquals($expectedLisp, $wordSearch->search("lisp"));
    }

    /**
     * uuid: cd1f0fa8-76af-4167-b105-935f78364dac
     */
    #[TestDox('Should not wrap around vertically to find a word')]
    public function testShouldNotWrapAroundVerticallyToFindAWord(): void
    {
        $grid = [
            "s",
            "u",
            "r",
            "a",
            "b",
            "c",
            "t"
        ];
        $expectedRust = null;
        $wordSearch   = new WordSearch($grid);

        $this->assertEquals($expectedRust, $wordSearch->search("rust"));
    }
}
