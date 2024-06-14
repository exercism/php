<?php

declare(strict_types=1);

class RaindropsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Raindrops.php';
    }

    /**
     * @testdox Sound for 1 is 1
     * uuid 1575d549-e502-46d4-a8e1-6b7bec6123d8
     */
    public function testSoundFor1Is1(): void
    {
        $this->assertSame("1", raindrops(1));
    }

    /**
     * @testdox Sound for 3 is Pling
     * uuid 1f51a9f9-4895-4539-b182-d7b0a5ab2913
     */
    public function testSoundFor3IsPling(): void
    {
        $this->assertSame("Pling", raindrops(3));
    }

    /**
     * @testdox Sound for 5 is Plang
     * uuid 2d9bfae5-2b21-4bcd-9629-c8c0e388f3e0
     */
    public function testSoundFor5IsPlang(): void
    {
        $this->assertSame("Plang", raindrops(5));
    }

    /**
     * @testdox Sound for 7 is Plong
     * uuid d7e60daa-32ef-4c23-b688-2abff46c4806
     */
    public function testSoundFor7IsPlong(): void
    {
        $this->assertSame("Plong", raindrops(7));
    }

    /**
     * @testdox Sound for 6 is Pling as it has a factor 3
     * uuid 6bb4947b-a724-430c-923f-f0dc3d62e56a
     */
    public function testSoundFor6IsPling(): void
    {
        $this->assertSame("Pling", raindrops(6));
    }

    /**
     * @testdox 2 to the power 3 does not make a raindrop sound as 3 is the exponent not the base
     * uuid ce51e0e8-d9d4-446d-9949-96eac4458c2d
     */
    public function testSoundFor8Is8(): void
    {
        $this->assertSame("8", raindrops(8));
    }

    /**
     * @testdox Sound for 9 is Pling as it has a factor 3
     * uuid 0dd66175-e3e2-47fc-8750-d01739856671
     */
    public function testSoundFor9IsPling(): void
    {
        $this->assertSame("Pling", raindrops(9));
    }

    /**
     * @testdox Sound for 10 is Plang as it has a factor 5
     * uuid 022c44d3-2182-4471-95d7-c575af225c96
     */
    public function testSoundFor10IsPlang(): void
    {
        $this->assertSame("Plang", raindrops(10));
    }

    /**
     * @testdox Sound for 14 is Plong as it has a factor of 7
     * uuid 37ab74db-fed3-40ff-b7b9-04acdfea8edf
     */
    public function testSoundFor14IsPlong(): void
    {
        $this->assertSame("Plong", raindrops(14));
    }

    /**
     * @testdox Sound for 15 is PlingPlang as it has factors 3 and 5
     * uuid 31f92999-6afb-40ee-9aa4-6d15e3334d0f
     */
    public function testSoundFor15IsPlingPlang(): void
    {
        $this->assertSame("PlingPlang", raindrops(15));
    }

    /**
     * @testdox Sound for 21 is PlingPlong as it has factors 3 and 7
     * uuid ff9bb95d-6361-4602-be2c-653fe5239b54
     */
    public function testSoundFor21IsPlingPlong(): void
    {
        $this->assertSame("PlingPlong", raindrops(21));
    }

    /**
     * @testdox Sound for 25 is Plang as it has a factor 5
     * uuid d2e75317-b72e-40ab-8a64-6734a21dece1
     */
    public function testSoundFor25IsPlang(): void
    {
        $this->assertSame("Plang", raindrops(25));
    }

    /**
     * @testdox Sound for 27 is Pling as it has a factor 3
     * uuid a09c4c58-c662-4e32-97fe-f1501ef7125c
     */
    public function testSoundFor27IsPlang(): void
    {
        $this->assertSame("Pling", raindrops(27));
    }

    /**
     * @testdox Sound for 35 is PlangPlong as it has factors 5 and 7
     * uuid bdf061de-8564-4899-a843-14b48b722789
     */
    public function testSoundFor35IsPlangPlong(): void
    {
        $this->assertSame("PlangPlong", raindrops(35));
    }

    /**
     * @testdox Sound for 49 is Plong as it has a factor 7
     * uuid c4680bee-69ba-439d-99b5-70c5fd1a7a83
     */
    public function testSoundFor49IsPlong(): void
    {
        $this->assertSame("Plong", raindrops(49));
    }

    /**
     * @testdox Sound for 52 is 52
     * uuid 17f2bc9a-b65a-4d23-8ccd-266e8c271444
     */
    public function testSoundFor52Is52(): void
    {
        $this->assertSame("52", raindrops(52));
    }

    /**
     * @testdox Sound for 105 is PlingPlangPlong as it has factors 3, 5 and 7
     * uuid e46677ed-ff1a-419f-a740-5c713d2830e4
     */
    public function testSoundFor105IsPlingPlangPlong(): void
    {
        $this->assertSame("PlingPlangPlong", raindrops(105));
    }

    /**
     * @testdox Sound for 3125 is Plang as it has a factor 5
     * uuid 13c6837a-0fcd-4b86-a0eb-20572f7deb0b
     */
    public function testSoundFor3125IsPlang(): void
    {
        $this->assertSame("Plang", raindrops(3125));
    }
}
