<?php

require "allergies.php";

class AllergiesTest extends PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideListOfAllergen
     *
     * @param Allergen $allergen
     */
    public function testNoAllergiesMeansNotAllergicToAnything($allergen)
    {
        $allergies = new Allergies(0);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * @dataProvider provideListOfAllergen
     *
     * @param Allergen $allergicTo
     */
    public function testAllergiesToOneAllergen($allergicTo)
    {
        $allergies = new Allergies($allergicTo->getScore());

        $this->assertTrue($allergies->isAllergicTo($allergicTo));
        $otherAllergen = array_filter(Allergen::allergenList(), function ($allergen) use ($allergicTo) {
            return $allergen != $allergicTo;
        });
        $self          = $this;
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
        $allergies = new Allergies(5);

        $this->assertTrue($allergies->isAllergicTo(new Allergen(Allergen::EGGS)));
    }


    public function testIsAllergicToLotsOfStuffs()
    {
        $allergies = new Allergies(248);

        $this->assertEqualsCanonicalizing([
            new Allergen(Allergen::CATS),
            new Allergen(Allergen::CHOCOLATE),
            new Allergen(Allergen::POLLEN),
            new Allergen(Allergen::STRAWBERRIES),
            new Allergen(Allergen::TOMATOES),
        ], $allergies->getList());
    }

    public function testIsAllergicToEggsAndPeanuts()
    {
        $allergies = new Allergies(3);

        $this->assertEqualsCanonicalizing([
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::PEANUTS),
        ], $allergies->getList());
    }

    public function testIsAllergicToEggsAndShellfish()
    {
        $allergies = new Allergies(5);

        $this->assertEqualsCanonicalizing([
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::SHELLFISH),
        ], $allergies->getList());
    }

    public function testIgnoreNonAllergenScorePart()
    {
        $allergies = new Allergies(509);

        $this->assertEqualsCanonicalizing([
            new Allergen(Allergen::CATS),
            new Allergen(Allergen::CHOCOLATE),
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::POLLEN),
            new Allergen(Allergen::SHELLFISH),
            new Allergen(Allergen::STRAWBERRIES),
            new Allergen(Allergen::TOMATOES),
        ], $allergies->getList());
    }

    /**
     * @dataProvider provideListOfAllergen
     */
    public function testIsAllergicToEverything($allergen)
    {
        $allergies = new Allergies(255);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }
}
