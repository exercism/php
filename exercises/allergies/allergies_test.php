<?php

require "allergies.php";

class AllergiesTest extends PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideListOfAllergen
     */
    public function testNoAllergiesMeansNotAllergicToAnything($allergen)
    {
        $allergies = new Allergies(0);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * @dataProvider provideListOfAllergen
     */
    public function testAllergiesToOneAllergen($allergicTo)
    {
        $this->markTestSkipped();
        $allergies = new Allergies($allergicTo->getScore());

        $this->assertTrue($allergies->isAllergicTo($allergicTo));
        $otherAllergen = array_filter(Allergen::allergenList(), function ($allergen) use ($allergicTo) {
            return $allergen != $allergicTo;
        });
        $self = $this;
        array_map(function ($allergen) use ($allergies, $self) {
            $self->assertFalse($allergies->isAllergicTo($allergen));
        }, $otherAllergen);
    }

    public function provideListOfAllergen()
    {
        return [
            [new Allergen(Allergen::CATS), 'Only allergic to cats'],
            [new Allergen(Allergen::CHOCOLATE), 'Only allergic to chocolate'],
            [new Allergen(Allergen::EGGS), 'Only allergic to eggs'],
            [new Allergen(Allergen::PEANUTS), 'Only allergic to peanuts'],
            [new Allergen(Allergen::POLLEN), 'Only allergic to pollen'],
            [new Allergen(Allergen::SHELLFISH), 'Only allergic to shellfish'],
            [new Allergen(Allergen::STRAWBERRIES), 'Only allergic to strawberries'],
            [new Allergen(Allergen::TOMATOES), 'Only allergic to tomatoes'],
        ];
    }

    public function testAllergicToEggsInAdditionToOtherStuff()
    {
        $this->markTestSkipped();
        $allergies = new Allergies(5);

        $this->assertTrue($allergies->isAllergicTo(new Allergen(Allergen::EGGS)));
    }


    public function testIsAllergicToLotsOfStuffs()
    {
        $this->markTestSkipped();
        $allergies = new Allergies(248);

        $this->assertEquals([
            new Allergen(Allergen::CATS),
            new Allergen(Allergen::CHOCOLATE),
            new Allergen(Allergen::POLLEN),
            new Allergen(Allergen::STRAWBERRIES),
            new Allergen(Allergen::TOMATOES),
        ], $allergies->getList(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = true);
    }

    public function testIsAllergicToEggsAndPeanuts()
    {
        $this->markTestSkipped();
        $allergies = new Allergies(3);

        $this->assertEquals([
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::PEANUTS),
        ], $allergies->getList(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = true);
    }

    public function testIsAllergicToEgssAndShellfish()
    {
        $this->markTestSkipped();
        $allergies = new Allergies(5);

        $this->assertEquals([
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::SHELLFISH),
        ], $allergies->getList(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = true);
    }

    public function testIgnoreNonAllergenScorePart()
    {
        $this->markTestSkipped();
        $allergies = new Allergies(509);

        $this->assertEquals([
            new Allergen(Allergen::CATS),
            new Allergen(Allergen::CHOCOLATE),
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::POLLEN),
            new Allergen(Allergen::SHELLFISH),
            new Allergen(Allergen::STRAWBERRIES),
            new Allergen(Allergen::TOMATOES),
        ], $allergies->getList(), "\$canonicalize = true", $delta = 0.0, $maxDepth = 10, $canonicalize = true);
    }

    /**
     * @dataProvider provideListOfAllergen
     */
    public function testIsAllergicToEverything($allergen)
    {
        $this->markTestSkipped();
        $allergies = new Allergies(255);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }
}
