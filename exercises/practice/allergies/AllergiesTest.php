<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class AllergiesTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Allergies.php';
    }

    /**
     * uuid 17fc7296-2440-4ac4-ad7b-d07c321bc5a0
     */
    #[TestDox('Testing for eggs allergy -> Not allergic to anything')]
    public function testTestingForEggsAllergyNotAllergicToAnything(): void
    {
        $item      = Allergen::EGGS;
        $score     = 0;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 07ced27b-1da5-4c2e-8ae2-cb2791437546
     */
    #[TestDox('Testing for eggs allergy -> Allergic only to eggs')]
    public function testTestingForEggsAllergyAllergicOnlyToEggs(): void
    {
        $item      = Allergen::EGGS;
        $score     = 1;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 5035b954-b6fa-4b9b-a487-dae69d8c5f96
     */
    #[TestDox('Testing for eggs allergy -> Allergic to eggs and something else')]
    public function testTestingForEggsAllergyAllergicToEggsAndSomethingElse(): void
    {
        $item      = Allergen::EGGS;
        $score     = 3;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 64a6a83a-5723-4b5b-a896-663307403310
     */
    #[TestDox('Testing for eggs allergy -> Allergic to something, but not eggs')]
    public function testTestingForEggsAllergyAllergicToSomethingButNotEggs(): void
    {
        $item      = Allergen::EGGS;
        $score     = 2;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 90c8f484-456b-41c4-82ba-2d08d93231c6
     */
    #[TestDox('Testing for eggs allergy -> Allergic to everything')]
    public function testTestingForEggsAllergyAllergicToEverything(): void
    {
        $item      = Allergen::EGGS;
        $score     = 255;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid d266a59a-fccc-413b-ac53-d57cb1f0db9d
     */
    #[TestDox('Testing for peanuts allergy -> Not allergic to anything')]
    public function testTestingForPeanutsAllergyNotAllergicToAnything(): void
    {
        $item      = Allergen::PEANUTS;
        $score     = 0;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid ea210a98-860d-46b2-a5bf-50d8995b3f2a
     */
    #[TestDox('Testing for peanuts allergy -> Allergic only to peanuts')]
    public function testTestingForPeanutsAllergyAllergicOnlyToPeanuts(): void
    {
        $item      = Allergen::PEANUTS;
        $score     = 2;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid eac69ae9-8d14-4291-ac4b-7fd2c73d3a5b
     */
    #[TestDox('Testing for peanuts allergy -> Allergic to peanuts and something else')]
    public function testTestingForPeanutsAllergyAllergicToPeanutsAndSomethingElse(): void
    {
        $item      = Allergen::PEANUTS;
        $score     = 7;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 9152058c-ce39-4b16-9b1d-283ec6d25085
     */
    #[TestDox('Testing for peanuts allergy -> Allergic to something, but not peanuts')]
    public function testTestingForPeanutsAllergyAllergicToSomethingButNotPeanuts(): void
    {
        $item      = Allergen::PEANUTS;
        $score     = 5;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid d2d71fd8-63d5-40f9-a627-fbdaf88caeab
     */
    #[TestDox('Testing for peanuts allergy -> Allergic to everything')]
    public function testTestingForPeanutsAllergyAllergicToEverything(): void
    {
        $item      = Allergen::PEANUTS;
        $score     = 255;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid b948b0a1-cbf7-4b28-a244-73ff56687c80
     */
    #[TestDox('Testing for shellfish allergy -> Not allergic to anything')]
    public function testTestingForShellfishAllergyNotAllergicToAnything(): void
    {
        $item      = Allergen::SHELLFISH;
        $score     = 0;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 9ce9a6f3-53e9-4923-85e0-73019047c567
     */
    #[TestDox('Testing for shellfish allergy -> Allergic only to shellfish')]
    public function testTestingForShellfishAllergyAllergicOnlyToShellfish(): void
    {
        $item      = Allergen::SHELLFISH;
        $score     = 4;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid b272fca5-57ba-4b00-bd0c-43a737ab2131
     */
    #[TestDox('Testing for shellfish allergy -> Allergic to shellfish and something else')]
    public function testTestingForShellfishAllergyAllergicToShellfishAndSomethingElse(): void
    {
        $item      = Allergen::SHELLFISH;
        $score     = 14;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 21ef8e17-c227-494e-8e78-470a1c59c3d8
     */
    #[TestDox('Testing for shellfish allergy -> Allergic to something, but not shellfish')]
    public function testTestingForShellfishAllergyAllergicToSomethingButNotShellfish(): void
    {
        $item      = Allergen::SHELLFISH;
        $score     = 10;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid cc789c19-2b5e-4c67-b146-625dc8cfa34e
     */
    #[TestDox('Testing for shellfish allergy -> Allergic to everything')]
    public function testTestingForShellfishAllergyAllergicToEverything(): void
    {
        $item      = Allergen::SHELLFISH;
        $score     = 255;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 651bde0a-2a74-46c4-ab55-02a0906ca2f5
     */
    #[TestDox('Testing for strawberries allergy -> Not allergic to anything')]
    public function testTestingForStrawberriesAllergyNotAllergicToAnything(): void
    {
        $item      = Allergen::STRAWBERRIES;
        $score     = 0;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid b649a750-9703-4f5f-b7f7-91da2c160ece
     */
    #[TestDox('Testing for strawberries allergy -> Allergic only to strawberries')]
    public function testTestingForStrawberriesAllergyAllergicOnlyToStrawberries(): void
    {
        $item      = Allergen::STRAWBERRIES;
        $score     = 8;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 50f5f8f3-3bac-47e6-8dba-2d94470a4bc6
     */
    #[TestDox('Testing for strawberries allergy -> Allergic to strawberries and something else')]
    public function testTestingForStrawberriesAllergyAllergicToStrawberriesAndSomethingElse(): void
    {
        $item      = Allergen::STRAWBERRIES;
        $score     = 28;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 23dd6952-88c9-48d7-a7d5-5d0343deb18d
     */
    #[TestDox('Testing for strawberries allergy -> Allergic to something, but not strawberries')]
    public function testTestingForStrawberriesAllergyAllergicToSomethingButNotStrawberries(): void
    {
        $item      = Allergen::STRAWBERRIES;
        $score     = 20;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 74afaae2-13b6-43a2-837a-286cd42e7d7e
     */
    #[TestDox('Testing for strawberries allergy -> Allergic to everything')]
    public function testTestingForStrawberriesAllergyAllergicToEverything(): void
    {
        $item      = Allergen::STRAWBERRIES;
        $score     = 255;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid c49a91ef-6252-415e-907e-a9d26ef61723
     */
    #[TestDox('Testing for tomatoes allergy -> Not allergic to anything')]
    public function testTestingForTomatoesAllergyNotAllergicToAnything(): void
    {
        $item      = Allergen::TOMATOES;
        $score     = 0;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid b69c5131-b7d0-41ad-a32c-e1b2cc632df8
     */
    #[TestDox('Testing for tomatoes allergy -> Allergic only to tomatoes')]
    public function testTestingForTomatoesAllergyAllergicOnlyToTomatoes(): void
    {
        $item      = Allergen::TOMATOES;
        $score     = 16;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 1ca50eb1-f042-4ccf-9050-341521b929ec
     */
    #[TestDox('Testing for tomatoes allergy -> Allergic to tomatoes and something else')]
    public function testTestingForTomatoesAllergyAllergicToTomatoesAndSomethingElse(): void
    {
        $item      = Allergen::TOMATOES;
        $score     = 56;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid e9846baa-456b-4eff-8025-034b9f77bd8e
     */
    #[TestDox('Testing for tomatoes allergy -> Allergic to something, but not tomatoes')]
    public function testTestingForTomatoesAllergyAllergicToSomethingButNotTomatoes(): void
    {
        $item      = Allergen::TOMATOES;
        $score     = 40;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid b2414f01-f3ad-4965-8391-e65f54dad35f
     */
    #[TestDox('Testing for tomatoes allergy -> Allergic to everything')]
    public function testTestingForTomatoesAllergyAllergicToEverything(): void
    {
        $item      = Allergen::TOMATOES;
        $score     = 255;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 978467ab-bda4-49f7-b004-1d011ead947c
     */
    #[TestDox('Testing for chocolate allergy -> Not allergic to anything')]
    public function testTestingForChocolateAllergyNotAllergicToAnything(): void
    {
        $item      = Allergen::CHOCOLATE;
        $score     = 0;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 59cf4e49-06ea-4139-a2c1-d7aad28f8cbc
     */
    #[TestDox('Testing for chocolate allergy -> Allergic only to chocolate')]
    public function testTestingForChocolateAllergyAllergicOnlyToChocolate(): void
    {
        $item      = Allergen::CHOCOLATE;
        $score     = 32;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid b0a7c07b-2db7-4f73-a180-565e07040ef1
     */
    #[TestDox('Testing for chocolate allergy -> Allergic to chocolate and something else')]
    public function testTestingForChocolateAllergyAllergicToChocolateAndSomethingElse(): void
    {
        $item      = Allergen::CHOCOLATE;
        $score     = 112;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid f5506893-f1ae-482a-b516-7532ba5ca9d2
     */
    #[TestDox('Testing for chocolate allergy -> Allergic to something, but not chocolate')]
    public function testTestingForChocolateAllergyAllergicToSomethingButNotChocolate(): void
    {
        $item      = Allergen::CHOCOLATE;
        $score     = 80;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 02debb3d-d7e2-4376-a26b-3c974b6595c6
     */
    #[TestDox('Testing for chocolate allergy -> Allergic to everything')]
    public function testTestingForChocolateAllergyAllergicToEverything(): void
    {
        $item      = Allergen::CHOCOLATE;
        $score     = 255;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 17f4a42b-c91e-41b8-8a76-4797886c2d96
     */
    #[TestDox('Testing for pollen allergy -> Not allergic to anything')]
    public function testTestingForPollenAllergyNotAllergicToAnything(): void
    {
        $item      = Allergen::POLLEN;
        $score     = 0;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 7696eba7-1837-4488-882a-14b7b4e3e399
     */
    #[TestDox('Testing for pollen allergy -> Allergic only to pollen')]
    public function testTestingForPollenAllergyAllergicOnlyToPollen(): void
    {
        $item      = Allergen::POLLEN;
        $score     = 64;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 9a49aec5-fa1f-405d-889e-4dfc420db2b6
     */
    #[TestDox('Testing for pollen allergy -> Allergic to pollen and something else')]
    public function testTestingForPollenAllergyAllergicToPollenAndSomethingElse(): void
    {
        $item      = Allergen::POLLEN;
        $score     = 224;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 3cb8e79f-d108-4712-b620-aa146b1954a9
     */
    #[TestDox('Testing for pollen allergy -> Allergic to something, but not pollen')]
    public function testTestingForPollenAllergyAllergicToSomethingButNotPollen(): void
    {
        $item      = Allergen::POLLEN;
        $score     = 160;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 1dc3fe57-7c68-4043-9d51-5457128744b2
     */
    #[TestDox('Testing for pollen allergy -> Allergic to everything')]
    public function testTestingForPollenAllergyAllergicToEverything(): void
    {
        $item      = Allergen::POLLEN;
        $score     = 255;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid d3f523d6-3d50-419b-a222-d4dfd62ce314
     */
    #[TestDox('Testing for cats allergy -> Not allergic to anything')]
    public function testTestingForCatsAllergyNotAllergicToAnything(): void
    {
        $item      = Allergen::CATS;
        $score     = 0;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid eba541c3-c886-42d3-baef-c048cb7fcd8f
     */
    #[TestDox('Testing for cats allergy -> Allergic only to cats')]
    public function testTestingForCatsAllergyAllergicOnlyToCats(): void
    {
        $item      = Allergen::CATS;
        $score     = 128;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid ba718376-26e0-40b7-bbbe-060287637ea5
     */
    #[TestDox('Testing for cats allergy -> Allergic to cats and something else')]
    public function testTestingForCatsAllergyAllergicToCatsAndSomethingElse(): void
    {
        $item      = Allergen::CATS;
        $score     = 192;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 3c6dbf4a-5277-436f-8b88-15a206f2d6c4
     */
    #[TestDox('Testing for cats allergy -> Allergic to something, but not cats')]
    public function testTestingForCatsAllergyAllergicToSomethingButNotCats(): void
    {
        $item      = Allergen::CATS;
        $score     = 64;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertFalse($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid 1faabb05-2b98-4995-9046-d83e4a48a7c1
     */
    #[TestDox('Testing for cats allergy -> Allergic to everything')]
    public function testTestingForCatsAllergyAllergicToEverything(): void
    {
        $item      = Allergen::CATS;
        $score     = 255;
        $allergies = new Allergies($score);
        $allergen  = new Allergen($item);

        $this->assertTrue($allergies->isAllergicTo($allergen));
    }

    /**
     * uuid f9c1b8e7-7dc5-4887-aa93-cebdcc29dd8f
     */
    #[TestDox('List when: -> No allergies')]
    public function testListWhenNoAllergies(): void
    {
        $score     = 0;
        $allergies = new Allergies($score);
        $expected  = [];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 9e1a4364-09a6-4d94-990f-541a94a4c1e8
     */
    #[TestDox('List when: -> Just eggs')]
    public function testListWhenJustEggs(): void
    {
        $score     = 1;
        $allergies = new Allergies($score);
        $expected  = [new Allergen(Allergen::EGGS)];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 8851c973-805e-4283-9e01-d0c0da0e4695
     */
    #[TestDox('List when: -> Just peanuts')]
    public function testListWhenJustPeanuts(): void
    {
        $score     = 2;
        $allergies = new Allergies($score);
        $expected  = [new Allergen(Allergen::PEANUTS)];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 2c8943cb-005e-435f-ae11-3e8fb558ea98
     */
    #[TestDox('List when: -> Just strawberries')]
    public function testListWhenJustStrawberries(): void
    {
        $score     = 8;
        $allergies = new Allergies($score);
        $expected  = [new Allergen(Allergen::STRAWBERRIES)];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 6fa95d26-044c-48a9-8a7b-9ee46ec32c5c
     */
    #[TestDox('List when: -> Eggs and peanuts')]
    public function testListWhenEggsAndPeanuts(): void
    {
        $score     = 3;
        $allergies = new Allergies($score);
        $expected  = [
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::PEANUTS)
        ];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 19890e22-f63f-4c5c-a9fb-fb6eacddfe8e
     */
    #[TestDox('List when: -> More than eggs but not peanuts')]
    public function testListWhenMoreThanEggsButNotPeanuts(): void
    {
        $score     = 5;
        $allergies = new Allergies($score);
        $expected  = [
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::SHELLFISH)
        ];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 4b68f470-067c-44e4-889f-c9fe28917d2f
     */
    #[TestDox('List when: -> Lots of stuff')]
    public function testListWhenLotsOfStuff(): void
    {
        $score     = 248;
        $allergies = new Allergies($score);
        $expected  = [
            new Allergen(Allergen::STRAWBERRIES),
            new Allergen(Allergen::TOMATOES),
            new Allergen(Allergen::CHOCOLATE),
            new Allergen(Allergen::POLLEN),
            new Allergen(Allergen::CATS),
        ];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 0881b7c5-9efa-4530-91bd-68370d054bc7
     */
    #[TestDox('List when: -> Everything')]
    public function testListWhenEverything(): void
    {
        $score     = 255;
        $allergies = new Allergies($score);
        $expected  = [
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::PEANUTS),
            new Allergen(Allergen::SHELLFISH),
            new Allergen(Allergen::STRAWBERRIES),
            new Allergen(Allergen::TOMATOES),
            new Allergen(Allergen::CHOCOLATE),
            new Allergen(Allergen::POLLEN),
            new Allergen(Allergen::CATS),

        ];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 12ce86de-b347-42a0-ab7c-2e0570f0c65b
     */
    #[TestDox('List when: -> No allergen score parts')]
    public function testListWhenNoAllergenScoreParts(): void
    {
        $score     = 509;
        $allergies = new Allergies($score);
        $expected  = [
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::SHELLFISH),
            new Allergen(Allergen::STRAWBERRIES),
            new Allergen(Allergen::TOMATOES),
            new Allergen(Allergen::CHOCOLATE),
            new Allergen(Allergen::POLLEN),
            new Allergen(Allergen::CATS),

        ];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }

    /**
     * uuid 93c2df3e-4f55-4fed-8116-7513092819cd
     */
    #[TestDox('List when: -> No allergen score parts without highest valid score')]
    public function testListWhenNoAllergenScorePartsWithoutHighestValidScore(): void
    {
        $score     = 257;
        $allergies = new Allergies($score);
        $expected  = [new Allergen(Allergen::EGGS)];

        $this->assertEqualsCanonicalizing($expected, array_values($allergies->getList()));
    }
}
