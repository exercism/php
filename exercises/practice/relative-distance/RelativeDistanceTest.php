<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class RelativeDistanceTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RelativeDistance.php';
    }

    /**
     * uuid 4a1ded74-5d32-47fb-8ae5-321f51d06b5b
     */
    #[TestDox('Direct parent-child relation')]
    public function testDirectParentChildRelation(): void
    {
        $familyTree = [
            "Vera"   => ["Tomoko"],
            "Tomoko" => ["Aditi"]
        ];
        $expected = 1;

        $this->assertEquals($expected, degreeOfSeparation($familyTree, "Vera", "Tomoko"));
    }

    /**
     * uuid 30d17269-83e9-4f82-a0d7-8ef9656d8dce
     */
    #[TestDox('Sibling relationship')]
    public function testSiblingRelationship(): void
    {
        $familyTree = [
            "Dalia" => ["Olga", "Yassin"]
        ];
        $expected = 1;

        $this->assertEquals($expected, degreeOfSeparation($familyTree, "Olga", "Yassin"));
    }

    /**
     * uuid 8dffa27d-a8ab-496d-80b3-2f21c77648b5
     */
    #[TestDox('Two degrees of separation, grandchild')]
    public function testTwoDegreesOfSeparationGrandchild(): void
    {
        $familyTree = [
            "Khadija" => ["Mateo"],
            "Mateo"   => ["Rami"]
        ];
        $expected = 2;

        $this->assertEquals($expected, degreeOfSeparation($familyTree, "Khadija", "Rami"));
    }

    /**
     * uuid 34e56ec1-d528-4a42-908e-020a4606ee60
     */
    #[TestDox('Unrelated individuals')]
    public function testUnrelatedIndividuals(): void
    {
        $familyTree = [
            "Priya" => ["Rami"],
            "Kaito" => ["Elif"]
        ];
        $expected = -1;

        $this->assertEquals($expected, degreeOfSeparation($familyTree, "Priya", "Kaito"));
    }

    /**
     * uuid 93ffe989-bad2-48c4-878f-3acb1ce2611b
     */
    #[TestDox('Complex graph, cousins')]
    public function testComplexGraphCousins(): void
    {
        $familyTree = [
            "Aiko"    => ["Bao", "Carlos"],
            "Bao"     => ["Dalia", "Elias"],
            "Carlos"  => ["Fatima", "Gustavo"],
            "Dalia"   => ["Hassan", "Isla"],
            "Elias"   => ["Javier"],
            "Fatima"  => ["Khadija", "Liam"],
            "Gustavo" => ["Mina"],
            "Hassan"  => ["Noah", "Olga"],
            "Isla"    => ["Pedro"],
            "Javier"  => ["Quynh", "Ravi"],
            "Khadija" => ["Sofia"],
            "Liam"    => ["Tariq", "Uma"],
            "Mina"    => ["Viktor", "Wang"],
            "Noah"    => ["Xiomara"],
            "Olga"    => ["Yuki"],
            "Pedro"   => ["Zane", "Aditi"],
            "Quynh"   => ["Boris"],
            "Ravi"    => ["Celine"],
            "Sofia"   => ["Diego", "Elif"],
            "Tariq"   => ["Farah"],
            "Uma"     => ["Giorgio"],
            "Viktor"  => ["Hana", "Ian"],
            "Wang"    => ["Jing"],
            "Xiomara" => ["Kaito"],
            "Yuki"    => ["Leila"],
            "Zane"    => ["Mateo"],
            "Aditi"   => ["Nia"],
            "Boris"   => ["Oscar"],
            "Celine"  => ["Priya"],
            "Diego"   => ["Qi"],
            "Elif"    => ["Rami"],
            "Farah"   => ["Sven"],
            "Giorgio" => ["Tomoko"],
            "Hana"    => ["Umar"],
            "Ian"     => ["Vera"],
            "Jing"    => ["Wyatt"],
            "Kaito"   => ["Xia"],
            "Leila"   => ["Yassin"],
            "Mateo"   => ["Zara"],
            "Nia"     => ["Antonio"],
            "Oscar"   => ["Bianca"],
            "Priya"   => ["Cai"],
            "Qi"      => ["Dimitri"],
            "Rami"    => ["Ewa"],
            "Sven"    => ["Fabio"],
            "Tomoko"  => ["Gabriela"],
            "Umar"    => ["Helena"],
            "Vera"    => ["Igor"],
            "Wyatt"   => ["Jun"],
            "Xia"     => ["Kim"],
            "Yassin"  => ["Lucia"],
            "Zara"    => ["Mohammed"]
        ];
        $expected = 9;

        $this->assertEquals($expected, degreeOfSeparation($familyTree, "Dimitri", "Fabio"));
    }

    /**
     * uuid 2cc2e76b-013a-433c-9486-1dbe29bf06e5
     */
    #[TestDox('Complex graph, no shortcut, far removed nephew')]
    public function testComplexGraphNoShortcutFarRemovedNephew(): void
    {
        $familyTree = [
            "Aiko"    => ["Bao", "Carlos"],
            "Bao"     => ["Dalia", "Elias"],
            "Carlos"  => ["Fatima", "Gustavo"],
            "Dalia"   => ["Hassan", "Isla"],
            "Elias"   => ["Javier"],
            "Fatima"  => ["Khadija", "Liam"],
            "Gustavo" => ["Mina"],
            "Hassan"  => ["Noah", "Olga"],
            "Isla"    => ["Pedro"],
            "Javier"  => ["Quynh", "Ravi"],
            "Khadija" => ["Sofia"],
            "Liam"    => ["Tariq", "Uma"],
            "Mina"    => ["Viktor", "Wang"],
            "Noah"    => ["Xiomara"],
            "Olga"    => ["Yuki"],
            "Pedro"   => ["Zane", "Aditi"],
            "Quynh"   => ["Boris"],
            "Ravi"    => ["Celine"],
            "Sofia"   => ["Diego", "Elif"],
            "Tariq"   => ["Farah"],
            "Uma"     => ["Giorgio"],
            "Viktor"  => ["Hana", "Ian"],
            "Wang"    => ["Jing"],
            "Xiomara" => ["Kaito"],
            "Yuki"    => ["Leila"],
            "Zane"    => ["Mateo"],
            "Aditi"   => ["Nia"],
            "Boris"   => ["Oscar"],
            "Celine"  => ["Priya"],
            "Diego"   => ["Qi"],
            "Elif"    => ["Rami"],
            "Farah"   => ["Sven"],
            "Giorgio" => ["Tomoko"],
            "Hana"    => ["Umar"],
            "Ian"     => ["Vera"],
            "Jing"    => ["Wyatt"],
            "Kaito"   => ["Xia"],
            "Leila"   => ["Yassin"],
            "Mateo"   => ["Zara"],
            "Nia"     => ["Antonio"],
            "Oscar"   => ["Bianca"],
            "Priya"   => ["Cai"],
            "Qi"      => ["Dimitri"],
            "Rami"    => ["Ewa"],
            "Sven"    => ["Fabio"],
            "Tomoko"  => ["Gabriela"],
            "Umar"    => ["Helena"],
            "Vera"    => ["Igor"],
            "Wyatt"   => ["Jun"],
            "Xia"     => ["Kim"],
            "Yassin"  => ["Lucia"],
            "Zara"    => ["Mohammed"]
        ];
        $expected = 14;

        $this->assertEquals($expected, degreeOfSeparation($familyTree, "Lucia", "Jun"));
    }

    /**
     * uuid 46c9fbcb-e464-455f-a718-049ea3c7400a
     */
    #[TestDox('Complex graph, some shortcuts, cross-down and cross-up, cousins several times removed, with unrelated family tree')]
    public function testComplexGraphSomeShortcutsCrossDownAndCrossUpCousinsSeveralTimesRemovedWithUnrelatedFamilyTree(): void
    {
        $familyTree = [
            "Aiko"    => ["Bao", "Carlos"],
            "Bao"     => ["Dalia"],
            "Carlos"  => ["Fatima", "Gustavo"],
            "Dalia"   => ["Hassan", "Isla"],
            "Fatima"  => ["Khadija", "Liam"],
            "Gustavo" => ["Mina"],
            "Hassan"  => ["Noah", "Olga"],
            "Isla"    => ["Pedro"],
            "Javier"  => ["Quynh", "Ravi"],
            "Khadija" => ["Sofia"],
            "Liam"    => ["Tariq", "Uma"],
            "Mina"    => ["Viktor", "Wang"],
            "Noah"    => ["Xiomara"],
            "Olga"    => ["Yuki"],
            "Pedro"   => ["Zane", "Aditi"],
            "Quynh"   => ["Boris"],
            "Ravi"    => ["Celine"],
            "Sofia"   => ["Diego", "Elif"],
            "Tariq"   => ["Farah"],
            "Uma"     => ["Giorgio"],
            "Viktor"  => ["Hana", "Ian"],
            "Wang"    => ["Jing"],
            "Xiomara" => ["Kaito"],
            "Yuki"    => ["Leila"],
            "Zane"    => ["Mateo"],
            "Aditi"   => ["Nia"],
            "Boris"   => ["Oscar"],
            "Celine"  => ["Priya"],
            "Diego"   => ["Qi"],
            "Elif"    => ["Rami"],
            "Farah"   => ["Sven"],
            "Giorgio" => ["Tomoko"],
            "Hana"    => ["Umar"],
            "Ian"     => ["Vera"],
            "Jing"    => ["Wyatt"],
            "Kaito"   => ["Xia"],
            "Leila"   => ["Yassin"],
            "Mateo"   => ["Zara"],
            "Nia"     => ["Antonio"],
            "Oscar"   => ["Bianca"],
            "Priya"   => ["Cai"],
            "Qi"      => ["Dimitri"],
            "Rami"    => ["Ewa"],
            "Sven"    => ["Fabio"],
            "Tomoko"  => ["Gabriela"],
            "Umar"    => ["Helena"],
            "Vera"    => ["Igor"],
            "Wyatt"   => ["Jun"],
            "Xia"     => ["Kim"],
            "Yassin"  => ["Lucia"],
            "Zara"    => ["Mohammed"]
        ];
        $expected = 12;

        $this->assertEquals($expected, degreeOfSeparation($familyTree, "Wyatt", "Xia"));
    }
}
