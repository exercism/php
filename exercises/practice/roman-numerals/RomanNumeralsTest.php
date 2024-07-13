<?php

declare(strict_types=1);

class RomanNumeralsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RomanNumerals.php';
    }

    /**
     * uuid 19828a3a-fbf7-4661-8ddd-cbaeee0e2178
     * @testdox 1 is I
     */
    public function test1IsI(): void
    {
        $this->assertSame('I', toRoman(1));
    }

    /**
     * uuid f088f064-2d35-4476-9a41-f576da3f7b03
     * @testdox 2 is II
     */
    public function test2IsII(): void
    {
        $this->assertSame('II', toRoman(2));
    }

    /**
     * uuid b374a79c-3bea-43e6-8db8-1286f79c7106
     * @testdox 3 is III
     */
    public function test3IsIII(): void
    {
        $this->assertSame('III', toRoman(3));
    }

    /**
     * uuid 05a0a1d4-a140-4db1-82e8-fcc21fdb49bb
     * @testdox 4 is IV
     */
    public function test4IsIV(): void
    {
        $this->assertSame('IV', toRoman(4));
    }

    /**
     * uuid 57c0f9ad-5024-46ab-975d-de18c430b290
     * @testdox 5 is V
     */
    public function test5IsV(): void
    {
        $this->assertSame('V', toRoman(5));
    }

    /**
     * uuid 20a2b47f-e57f-4797-a541-0b3825d7f249
     * @testdox 6 is VI
     */
    public function test6IsVI(): void
    {
        $this->assertSame('VI', toRoman(6));
    }

    /**
     * uuid ff3fb08c-4917-4aab-9f4e-d663491d083d
     * @testdox 9 is IX
     */
    public function test9IsIX(): void
    {
        $this->assertSame('IX', toRoman(9));
    }

    /**
     * uuid 6d1d82d5-bf3e-48af-9139-87d7165ed509
     * @testdox 16 is XVI
     */
    public function test16IsXVI(): void
    {
        $this->assertSame('XVI', toRoman(16));
    }

    /**
     * uuid 2bda64ca-7d28-4c56-b08d-16ce65716cf6
     * @testdox 27 is XXVII
     */
    public function test27IsXXVII(): void
    {
        $this->assertSame('XXVII', toRoman(27));
    }

    /**
     * uuid a1f812ef-84da-4e02-b4f0-89c907d0962c
     * @testdox 48 is XLVIII
     */
    public function test48IsXLVIII(): void
    {
        $this->assertSame('XLVIII', toRoman(48));
    }

    /**
     * uuid 607ead62-23d6-4c11-a396-ef821e2e5f75
     * @testdox 49 is XLIX
     */
    public function test49IsXLIX(): void
    {
        $this->assertSame('XLIX', toRoman(49));
    }

    /**
     * uuid d5b283d4-455d-4e68-aacf-add6c4b51915
     * @testdox 59 is LIX
     */
    public function test59IsLIX(): void
    {
        $this->assertSame('LIX', toRoman(59));
    }

    /**
     * uuid 4465ffd5-34dc-44f3-ada5-56f5007b6dad
     * @testdox 66 is LXVI
     */
    public function test66IsLXVI(): void
    {
        $this->assertSame('LXVI', toRoman(66));
    }

    /**
     * uuid 46b46e5b-24da-4180-bfe2-2ef30b39d0d0
     * @testdox 93 is XCIII
     */
    public function test93IsXCIII(): void
    {
        $this->assertSame('XCIII', toRoman(93));
    }

    /**
     * uuid 30494be1-9afb-4f84-9d71-db9df18b55e3
     * @testdox 141 is CXLI
     */
    public function test141IsCXLI(): void
    {
        $this->assertSame('CXLI', toRoman(141));
    }

    /**
     * uuid 267f0207-3c55-459a-b81d-67cec7a46ed9
     * @testdox 163 is CLXIII
     */
    public function test163IsCLXIII(): void
    {
        $this->assertSame('CLXIII', toRoman(163));
    }

    /**
     * uuid 902ad132-0b4d-40e3-8597-ba5ed611dd8d
     * @testdox 166 is CLXVI
     */
    public function test166IsCLXVI(): void
    {
        $this->assertSame('CLXVI', toRoman(166));
    }

    /**
     * uuid cdb06885-4485-4d71-8bfb-c9d0f496b404
     * @testdox 402 is CDII
     */
    public function test402IsCDII(): void
    {
        $this->assertSame('CDII', toRoman(402));
    }

    /**
     * uuid 6b71841d-13b2-46b4-ba97-dec28133ea80
     * @testdox 575 is DLXXV
     */
    public function test575IsDLXXV(): void
    {
        $this->assertSame('DLXXV', toRoman(575));
    }

    /**
     * uuid dacb84b9-ea1c-4a61-acbb-ce6b36674906
     * @testdox 666 is DCLXVI
     */
    public function test666IsDCLXVI(): void
    {
        $this->assertSame('DCLXVI', toRoman(666));
    }

    /**
     * uuid 432de891-7fd6-4748-a7f6-156082eeca2f
     * @testdox 911 is CMXI
     */
    public function test911IsCMXI(): void
    {
        $this->assertSame('CMXI', toRoman(911));
    }

    /**
     * uuid e6de6d24-f668-41c0-88d7-889c0254d173
     * @testdox 1024 is MXXIV
     */
    public function test1024IsMXXIV(): void
    {
        $this->assertSame('MXXIV', toRoman(1024));
    }

    /**
     * uuid efbe1d6a-9f98-4eb5-82bc-72753e3ac328
     * @testdox 1666 is MDCLXVI
     */
    public function test1666IsMDCLXVI(): void
    {
        $this->assertSame('MDCLXVI', toRoman(1666));
    }

    /**
     * uuid bb550038-d4eb-4be2-a9ce-f21961ac3bc6
     * @testdox 3000 is MMM
     */
    public function test3000IsMMM(): void
    {
        $this->assertSame('MMM', toRoman(3000));
    }

    /**
     * uuid 3bc4b41c-c2e6-49d9-9142-420691504336
     * @testdox 3001 is MMMI
     */
    public function test3001IsMMMI(): void
    {
        $this->assertSame('MMMI', toRoman(3001));
    }

    /**
     * uuid 2f89cad7-73f6-4d1b-857b-0ef531f68b7e
     * @testdox 3888 is MMMDCCCLXXXVIII
     */
    public function test3888IsMMMDCCCLXXXVIII(): void
    {
        $this->assertSame('MMMDCCCLXXXVIII', toRoman(3888));
    }

    /**
     * uuid 4e18e96b-5fbb-43df-a91b-9cb511fe0856
     * @testdox 3999 is MMMCMXCIX
     */
    public function test3999IsMMMCMXCIX(): void
    {
        $this->assertSame('MMMCMXCIX', toRoman(3999));
    }
}
