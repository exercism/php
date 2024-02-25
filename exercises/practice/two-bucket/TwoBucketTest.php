<?php

declare(strict_types=1);

class TwoBucketTest extends PHPUnit\Framework\TestCase
{
    private TwoBucket $twoBucket;

    public static function setUpBeforeClass(): void
    {
        require_once 'TwoBucket.php';
    }

    protected function setUp(): void
    {
        $this->twoBucket = new TwoBucket();
    }

    /**
     * uuid: a6f2b4ba-065f-4dca-b6f0-e3eee51cb661
     */
    public function testMeasureUsingBucketOneOfSize3AndBucketTwoOfSize5StartWithBucketOne(): void
    {
        $buckOne = 3;
        $buckTwo = 5;
        $goal = 1;
        $starterBuck = 'one';
        $solution = $this->twoBucket->solve($buckOne, $buckTwo, $goal, $starterBuck);

        $this->assertEquals(4, $solution->numberOfActions);
        $this->assertEquals('one', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(5, $solution->litersLeftInOtherBucket);
    }

    /**
     * uuid: 6c4ea451-9678-4926-b9b3-68364e066d40
     */
    public function testMeasureUsingBucketOneOfSize3AndBucketTwoOfSize5StartWithBucketTwo(): void
    {
        $buckOne = 3;
        $buckTwo = 5;
        $goal = 1;
        $starterBuck = 'two';
        $solution = $this->twoBucket->solve($buckOne, $buckTwo, $goal, $starterBuck);

        $this->assertEquals(8, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(3, $solution->litersLeftInOtherBucket);
    }

    /**
     * uuid: 3389f45e-6a56-46d5-9607-75aa930502ff
     */
    public function testMeasureUsingBucketOneOfSize7AndBucketTwoOfSize11StartWithBucketOne(): void
    {
        $buckOne = 7;
        $buckTwo = 11;
        $goal = 2;
        $starterBuck = 'one';
        $solution = $this->twoBucket->solve($buckOne, $buckTwo, $goal, $starterBuck);

        $this->assertEquals(14, $solution->numberOfActions);
        $this->assertEquals('one', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(11, $solution->litersLeftInOtherBucket);
    }

    /**
     * uuid: fe0ff9a0-3ea5-4bf7-b17d-6d4243961aa1
     */
    public function testMeasureUsingBucketOneOfSize7AndBucketTwoOfSize11StartWithBucketTwo(): void
    {
        $buckOne = 7;
        $buckTwo = 11;
        $goal = 2;
        $starterBuck = 'two';
        $solution = $this->twoBucket->solve($buckOne, $buckTwo, $goal, $starterBuck);

        $this->assertEquals(18, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(7, $solution->litersLeftInOtherBucket);
    }

    /**
     * uuid: 0ee1f57e-da84-44f7-ac91-38b878691602
     */
    public function testMeasureOneStepUsingBucketOneOfSize1AndBucketTwoOfSize3StartWithBucketTwo(): void
    {
        $solution = $this->twoBucket->solve(1, 3, 3, 'two');

        $this->assertEquals(1, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(0, $solution->litersLeftInOtherBucket);
    }

    /**
     * uuid: eb329c63-5540-4735-b30b-97f7f4df0f84
     */
    public function testMeasureUsingBucketOneOfSize2AndBucketTwoOfSize3StartWithBucketOneAndEndWithBucketTwo(): void
    {
        $solution = $this->twoBucket->solve(2, 3, 3, 'one');

        $this->assertEquals(2, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(2, $solution->litersLeftInOtherBucket);
    }

    /**
     * uuid: 449be72d-b10a-4f4b-a959-ca741e333b72
     */
    public function testReachabilityNotPossibleToReachGoalStartWithBucketOne(): void
    {
        $buckOne = 6;
        $buckTwo = 15;
        $this->expectException(Exception::class);

        $this->twoBucket->solve($buckOne, $buckTwo, 5, 'one');
    }

    /**
     * uuid: aac38b7a-77f4-4d62-9b91-8846d533b054
     */
    public function testReachabilityNotPossibleToReachGoalStartWithBucketOneAndEndWithBucketTwo(): void
    {
        $solution = $this->twoBucket->solve(6, 15, 9, 'one');

        $this->assertEquals(10, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(0, $solution->litersLeftInOtherBucket);
    }

    /**
     * uuid: aac38b7a-77f4-4d62-9b91-8846d533b054
     */
    public function testWithSameBucketsButDifferentGoalItIsPossible(): void
    {
        $buckOne = 6;
        $buckTwo = 15;
        $goal = 9;
        $starterBuck = 'one';
        $solution = $this->twoBucket->solve($buckOne, $buckTwo, $goal, $starterBuck);

        $this->assertEquals(10, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(0, $solution->litersLeftInOtherBucket);
    }

    /**
     * uuid: 74633132-0ccf-49de-8450-af4ab2e3b299
     */
    public function testGoalLargerThanBothBucketsIsImpossible(): void
    {
        $this->expectException(Exception::class);
        $this->twoBucket->solve(5, 7, 8, 'one');
    }
}
