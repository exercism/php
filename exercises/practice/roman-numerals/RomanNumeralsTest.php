<?php

declare(strict_types=1);

class RomanNumeralsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RomanNumerals.php';
    }

    /**
     * @testdox 1 is I
     * uuid 19828a3a-fbf7-4661-8ddd-cbaeee0e2178
     */
    public function test1IsI(): void
    {
        $this->assertSame('I', toRoman(1));
    }

    /**
     * @testdox 2 is II
     * uuid f088f064-2d35-4476-9a41-f576da3f7b03
     */
    public function test2IsII(): void
    {
        $this->assertSame('II', toRoman(2));
    }

    /**
     * @testdox 3 is III
     * uuid b374a79c-3bea-43e6-8db8-1286f79c7106
     */
    public function test3IsIII(): void
    {
        $this->assertSame('III', toRoman(3));
    }

    /**
     * @testdox 4 is IV
     * uuid 05a0a1d4-a140-4db1-82e8-fcc21fdb49bb
     */
    public function test4IsIV(): void
    {
        $this->assertSame('IV', toRoman(4));
    }

    /**
     * @testdox 5 is V
     * uuid 57c0f9ad-5024-46ab-975d-de18c430b290
     */
    public function test5IsV(): void
    {
        $this->assertSame('V', toRoman(5));
    }

    /**
     * @testdox 6 is VI
     * uuid 20a2b47f-e57f-4797-a541-0b3825d7f249
     */
    public function test6IsVI(): void
    {
        $this->assertSame('VI', toRoman(6));
    }

    /**
     * @testdox 9 is IX
     * uuid ff3fb08c-4917-4aab-9f4e-d663491d083d
     */
    public function test9IsIX(): void
    {
        $this->assertSame('IX', toRoman(9));
    }

    /**
     * @testdox 16 is XVI
     * uuid 6d1d82d5-bf3e-48af-9139-87d7165ed509
     */
    public function test16IsXVI(): void
    {
        $this->assertSame('XVI', toRoman(16));
    }

    /**
     * @testdox 27 is XXVII
     * uuid 2bda64ca-7d28-4c56-b08d-16ce65716cf6
     */
    public function test27IsXXVII(): void
    {
        $this->assertSame('XXVII', toRoman(27));
    }

    /**
     * @testdox 48 is XLVIII
     * uuid a1f812ef-84da-4e02-b4f0-89c907d0962c
     */
    public function test48IsXLVIII(): void
    {
        $this->assertSame('XLVIII', toRoman(48));
    }

    /**
     * @testdox 49 is XLIX
     * uuid 607ead62-23d6-4c11-a396-ef821e2e5f75
     */
    public function test49IsXLIX(): void
    {
        $this->assertSame('XLIX', toRoman(49));
    }

    /**
     * @testdox 59 is LIX
     * uuid d5b283d4-455d-4e68-aacf-add6c4b51915
     */
    public function test59IsLIX(): void
    {
        $this->assertSame('LIX', toRoman(59));
    }

    /**
     * @testdox 66 is LXVI
     * uuid 4465ffd5-34dc-44f3-ada5-56f5007b6dad
     */
    public function test66IsLXVI(): void
    {
        $this->assertSame('LXVI', toRoman(66));
    }

    /**
     * @testdox 93 is XCIII
     * uuid 46b46e5b-24da-4180-bfe2-2ef30b39d0d0
     */
    public function test93IsXCIII(): void
    {
        $this->assertSame('XCIII', toRoman(93));
    }

    /**
     * @testdox 141 is CXLI
     * uuid 30494be1-9afb-4f84-9d71-db9df18b55e3
     */
    public function test141IsCXLI(): void
    {
        $this->assertSame('CXLI', toRoman(141));
    }

    /**
     * @testdox 163 is CLXIII
     * uuid 267f0207-3c55-459a-b81d-67cec7a46ed9
     */
    public function test163IsCLXIII(): void
    {
        $this->assertSame('CLXIII', toRoman(163));
    }

    /**
     * @testdox 166 is CLXVI
     * uuid 902ad132-0b4d-40e3-8597-ba5ed611dd8d
     */
    public function test166IsCLXVI(): void
    {
        $this->assertSame('CLXVI', toRoman(166));
    }

    /**
     * @testdox 402 is CDII
     * uuid cdb06885-4485-4d71-8bfb-c9d0f496b404
     */
    public function test402IsCDII(): void
    {
        $this->assertSame('CDII', toRoman(402));
    }

    /**
     * @testdox 575 is DLXXV
     * uuid 6b71841d-13b2-46b4-ba97-dec28133ea80
     */
    public function test575IsDLXXV(): void
    {
        $this->assertSame('DLXXV', toRoman(575));
    }

    /**
     * @testdox 666 is DCLXVI
     * uuid dacb84b9-ea1c-4a61-acbb-ce6b36674906
     */
    public function test666IsDCLXVI(): void
    {
        $this->assertSame('DCLXVI', toRoman(666));
    }

    /**
     * @testdox 911 is CMXI
     * uuid 432de891-7fd6-4748-a7f6-156082eeca2f
     */
    public function test911IsCMXI(): void
    {
        $this->assertSame('CMXI', toRoman(911));
    }

    /**
     * @testdox 1024 is MXXIV
     * uuid e6de6d24-f668-41c0-88d7-889c0254d173
     */
    public function test1024IsMXXIV(): void
    {
        $this->assertSame('MXXIV', toRoman(1024));
    }

    /**
     * @testdox 1666 is MDCLXVI
     * uuid efbe1d6a-9f98-4eb5-82bc-72753e3ac328
     */
    public function test1666IsMDCLXVI(): void
    {
        $this->assertSame('MDCLXVI', toRoman(1666));
    }

    /**
     * @testdox 3000 is MMM
     * uuid bb550038-d4eb-4be2-a9ce-f21961ac3bc6
     */
    public function test3000IsMMM(): void
    {
        $this->assertSame('MMM', toRoman(3000));
    }

    /**
     * @testdox 3001 is MMMI
     * uuid 3bc4b41c-c2e6-49d9-9142-420691504336
     */
    public function test3001IsMMMI(): void
    {
        $this->assertSame('MMMI', toRoman(3001));
    }

    /**
     * @testdox 3888 is MMMDCCCLXXXVIII
     * uuid 2f89cad7-73f6-4d1b-857b-0ef531f68b7e
     */
    public function test3888IsMMMDCCCLXXXVIII(): void
    {
        $this->assertSame('MMMDCCCLXXXVIII', toRoman(3888));
    }

    /**
     * @testdox 3999 is MMMCMXCIX
     * uuid 4e18e96b-5fbb-43df-a91b-9cb511fe0856
     */
    public function test3999IsMMMCMXCIX(): void
    {
        $this->assertSame('MMMCMXCIX', toRoman(3999));
    }
}
