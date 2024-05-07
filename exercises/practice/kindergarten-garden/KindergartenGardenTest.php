<?php

declare(strict_types=1);

class KindergartenGardenTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'KindergartenGarden.php';
    }

    /**
     * uuid: 1fc316ed-17ab-4fba-88ef-3ae78296b692
     */
    public function testGardenSingleStudent(): void
    {
        $garden = new KindergartenGarden("RC\nGG");
        $this->assertEquals(['radishes', 'clover', 'grass', 'grass'], $garden->plants('Alice'));
    }

    /**
     * uuid: acd19dc1-2200-4317-bc2a-08f021276b40
     */
    public function testDifferentGardenSingleStudent(): void
    {
        $garden = new KindergartenGarden("VC\nRC");
        $this->assertEquals(['violets', 'clover', 'radishes', 'clover'], $garden->plants('Alice'));
    }

    /**
     * uuid: c376fcc8-349c-446c-94b0-903947315757
     */
    public function testGardenWithTwoStudents(): void
    {
        $garden = new KindergartenGarden("VVCG\nVVRC");
        $this->assertEquals(['clover', 'grass', 'radishes', 'clover'], $garden->plants('Bob'));
    }

    /**
     * uuid: 2d620f45-9617-4924-9d27-751c80d17db9
     */
    public function testSecondStudentsGarden(): void
    {
        $garden = new KindergartenGarden("VVCCGG\nVVCCGG");
        $this->assertEquals(['clover', 'clover', 'clover', 'clover'], $garden->plants('Bob'));
    }

    /**
     * uuid: 57712331-4896-4364-89f8-576421d69c44
     */
    public function testThirdStudentsGarden(): void
    {
        $garden = new KindergartenGarden("VVCCGG\nVVCCGG");
        $this->assertEquals(['grass', 'grass', 'grass', 'grass'], $garden->plants('Charlie'));
    }

    /**
     * uuid: 149b4290-58e1-40f2-8ae4-8b87c46e765b
     */
    public function testFullGardenForAlice(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(['violets', 'radishes', 'violets', 'radishes'], $garden->plants('Alice'));
    }

    /**
     * uuid: ba25dbbc-10bd-4a37-b18e-f89ecd098a5e
     */
    public function testFullGardenForBob(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(['clover', 'grass', 'clover', 'clover'], $garden->plants('Bob'));
    }

    /**
     * uuid: 566b621b-f18e-4c5f-873e-be30544b838c
     */
    public function testFullGardenForCharlie(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(['violets', 'violets', 'clover', 'grass'], $garden->plants('Charlie'));
    }

    /**
     * uuid: 3ad3df57-dd98-46fc-9269-1877abf612aa
     */
    public function testFullGardenForDavid(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["radishes", "violets", "clover", "radishes"], $garden->plants('David'));
    }

    /**
     * uuid: 0f0a55d1-9710-46ed-a0eb-399ba8c72db2
     */
    public function testFullGardenForEve(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["clover", "grass", "radishes", "grass"], $garden->plants('Eve'));
    }

    /**
     * uuid: a7e80c90-b140-4ea1-aee3-f4625365c9a4
     */
    public function testFullGardenForFred(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["grass", "clover", "violets", "clover"], $garden->plants('Fred'));
    }

    /**
     * uuid: 9d94b273-2933-471b-86e8-dba68694c615
     */
    public function testFullGardenForGinny(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["clover", "grass", "grass", "clover"], $garden->plants('Ginny'));
    }

    /**
     * uuid: f55bc6c2-ade8-4844-87c4-87196f1b7258
     */
    public function testFullGardenForHarriet(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["violets", "radishes", "radishes", "violets"], $garden->plants('Harriet'));
    }

    /**
     * uuid: 759070a3-1bb1-4dd4-be2c-7cce1d7679ae
     */
    public function testFullGardenForIleana(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["grass", "clover", "violets", "clover"], $garden->plants('Ileana'));
    }

    /**
     * uuid: 78578123-2755-4d4a-9c7d-e985b8dda1c6
     */
    public function testFullGardenForJoseph(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["violets", "clover", "violets", "grass"], $garden->plants('Joseph'));
    }

    /**
     * uuid: 6bb66df7-f433-41ab-aec2-3ead6e99f65b
     */
    public function testFullGardenForKincaid(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["grass", "clover", "clover", "grass"], $garden->plants('Kincaid'));
    }

    /**
     * uuid: d7edec11-6488-418a-94e6-ed509e0fa7eb
     */
    public function testFullGardenForLarry(): void
    {
        $diagram = "VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV";
        $garden = new KindergartenGarden($diagram);
        $this->assertEquals(["grass", "violets", "clover", "violets"], $garden->plants('Larry'));
    }
}
