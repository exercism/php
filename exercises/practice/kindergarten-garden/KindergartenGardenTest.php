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
     * @testdox partial garden -> garden with single student
     */
    public function testGardenSingleStudent(): void
    {
        $garden = new KindergartenGarden("RC\nGG");
        $this->assertEquals(['radishes', 'clover', 'grass', 'grass'], $garden->plants('Alice'));
    }

    /**
     * uuid: acd19dc1-2200-4317-bc2a-08f021276b40
     * @testdox partial garden -> different garden with single student
     */
    public function testDifferentGardenSingleStudent(): void
    {
        $garden = new KindergartenGarden("VC\nRC");
        $this->assertEquals(['violets', 'clover', 'radishes', 'clover'], $garden->plants('Alice'));
    }

    /**
     * uuid: c376fcc8-349c-446c-94b0-903947315757
     * @testdox partial garden -> garden with two students
     */
    public function testGardenWithTwoStudents(): void
    {
        $garden = new KindergartenGarden("VVCG\nVVRC");
        $this->assertEquals(['clover', 'grass', 'radishes', 'clover'], $garden->plants('Bob'));
    }

    /**
     * uuid: 2d620f45-9617-4924-9d27-751c80d17db9
     * @testdox partial garden -> multiple students for the same garden with three students -> second student's garden
     */
    public function testSecondStudentsGarden(): void
    {
        $garden = new KindergartenGarden("VVCCGG\nVVCCGG");
        $this->assertEquals(['clover', 'clover', 'clover', 'clover'], $garden->plants('Bob'));
    }

    /**
     * uuid: 57712331-4896-4364-89f8-576421d69c44
     * @testdox partial garden -> multiple students for the same garden with three students -> third student's garden
     */
    public function testThirdStudentsGarden(): void
    {
        $garden = new KindergartenGarden("VVCCGG\nVVCCGG");
        $this->assertEquals(['grass', 'grass', 'grass', 'grass'], $garden->plants('Charlie'));
    }

    /**
     * uuid: 149b4290-58e1-40f2-8ae4-8b87c46e765b
     * @testdox full garden -> for Alice, first student's garden
     */
    public function testFullGardenForAlice(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(['violets', 'radishes', 'violets', 'radishes'], $garden->plants('Alice'));
    }

    /**
     * uuid: ba25dbbc-10bd-4a37-b18e-f89ecd098a5e
     * @testdox full garden -> for Bob, second student's garden
     */
    public function testFullGardenForBob(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(['clover', 'grass', 'clover', 'clover'], $garden->plants('Bob'));
    }

    /**
     * uuid: 566b621b-f18e-4c5f-873e-be30544b838c
     * @testdox full garden -> for Charlie
     */
    public function testFullGardenForCharlie(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(['violets', 'violets', 'clover', 'grass'], $garden->plants('Charlie'));
    }

    /**
     * uuid: 3ad3df57-dd98-46fc-9269-1877abf612aa
     * @testdox full garden -> for David
     */
    public function testFullGardenForDavid(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["radishes", "violets", "clover", "radishes"], $garden->plants('David'));
    }

    /**
     * uuid: 0f0a55d1-9710-46ed-a0eb-399ba8c72db2
     * @testdox full garden -> for Eve
     */
    public function testFullGardenForEve(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["clover", "grass", "radishes", "grass"], $garden->plants('Eve'));
    }

    /**
     * uuid: a7e80c90-b140-4ea1-aee3-f4625365c9a4
     * @testdox full garden -> for Fred
     */
    public function testFullGardenForFred(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["grass", "clover", "violets", "clover"], $garden->plants('Fred'));
    }

    /**
     * uuid: 9d94b273-2933-471b-86e8-dba68694c615
     * @testdox full garden -> for Ginny
     */
    public function testFullGardenForGinny(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["clover", "grass", "grass", "clover"], $garden->plants('Ginny'));
    }

    /**
     * uuid: f55bc6c2-ade8-4844-87c4-87196f1b7258
     * @testdox full garden -> for Harriet
     */
    public function testFullGardenForHarriet(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["violets", "radishes", "radishes", "violets"], $garden->plants('Harriet'));
    }

    /**
     * uuid: 759070a3-1bb1-4dd4-be2c-7cce1d7679ae
     * @testdox full garden -> for Ileana
     */
    public function testFullGardenForIleana(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["grass", "clover", "violets", "clover"], $garden->plants('Ileana'));
    }

    /**
     * uuid: 78578123-2755-4d4a-9c7d-e985b8dda1c6
     * @testdox full garden -> for Joseph
     */
    public function testFullGardenForJoseph(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["violets", "clover", "violets", "grass"], $garden->plants('Joseph'));
    }

    /**
     * uuid: 6bb66df7-f433-41ab-aec2-3ead6e99f65b
     * @testdox full garden -> for Kincaid, second to last student's garden
     */
    public function testFullGardenForKincaid(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["grass", "clover", "clover", "grass"], $garden->plants('Kincaid'));
    }

    /**
     * uuid: d7edec11-6488-418a-94e6-ed509e0fa7eb
     * @testdox full garden -> for Larry, last student's garden
     */
    public function testFullGardenForLarry(): void
    {
        $garden = new KindergartenGarden("VRCGVVRVCGGCCGVRGCVCGCGV\nVRCCCGCRRGVCGCRVVCVGCGCV");
        $this->assertEquals(["grass", "violets", "clover", "violets"], $garden->plants('Larry'));
    }
}
