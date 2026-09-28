<?php

namespace App\Tests\TestGeneration\Group;

use App\Tests\TestGeneration\ScenarioFixture;
use App\TrackData\CanonicalData;
use App\TrackData\Group;
use App\TrackData\InnerGroup;
use App\TrackData\ItemFactory;
use App\TrackData\Item;
use App\TrackData\TestCase;
use App\TrackData\Unknown;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

#[TestDox('ItemFactory (App\Tests\TestGeneration\ItemFactory\ItemFactoryTest)')]
final class ItemFactoryTest extends PHPUnitTestCase
{
    use ScenarioFixture;

    #[Test]
    #[TestDox('$_dataName')]
    #[DataProvider('scenarios')]
    public function detectsExpectedItemType(
        string $scenario,
        string $fqcn,
    ): void {
        $input = $this->rawDataFor($scenario);

        $subject = new ItemFactory();
        $actual = $subject->from($input);

        $this->assertInstanceOf(Item::class, $actual);
        $this->assertInstanceOf($fqcn, $actual);
    }

    public static function scenarios(): array
    {
        return [
            'When given a minimal valid canonical data object, then produces CanonicalData'
                => [ 'canonical-data-object-minimal', CanonicalData::class ],
            'When given a maximal valid canonical data object, then produces CanonicalData'
                => [ 'canonical-data-object-maximal', CanonicalData::class ],
            'When given a minimal valid group object, then produces Group'
                => [ 'group-object-minimal', Group::class ],
            'When given a maximal valid group object, then produces Group'
                => [ 'group-object-maximal', Group::class ],
            'When given an empty array, then produces InnerGroup'
                => [ 'empty-array', InnerGroup::class ],
            'When given a non-empty array, then produces InnerGroup'
                => [ 'non-empty-array', InnerGroup::class ],
            'When given a minimal valid test case object, then produces TestCase'
                => [ 'test-case-object-minimal', TestCase::class ],
            'When given a maximal valid test case object, then produces TestCase'
                => [ 'test-case-object-maximal', TestCase::class ],
            'When given an empty object, then produces Unknown'
                => [ 'empty-object', Unknown::class ],
        ];
    }
}
