<?php

declare(strict_types=1);

class TwoBucketTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'TwoBucket.php';
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
        $twoBucket = new TwoBucket($buckOne, $buckTwo, $goal, $starterBuck);
        $result = $twoBucket->solve();

        $this->assertEquals(4, $result['moves']);
        $this->assertEquals('one', $result['goalBucket']);
        $this->assertEquals(5, $result['otherBucket']);
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
        $twoBucket = new TwoBucket($buckOne, $buckTwo, $goal, $starterBuck);
        $result = $twoBucket->solve();

        $this->assertEquals(8, $result['moves']);
        $this->assertEquals('two', $result['goalBucket']);
        $this->assertEquals(3, $result['otherBucket']);
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
        $twoBucket = new TwoBucket($buckOne, $buckTwo, $goal, $starterBuck);
        $result = $twoBucket->solve();

        $this->assertEquals(14, $result['moves']);
        $this->assertEquals('one', $result['goalBucket']);
        $this->assertEquals(11, $result['otherBucket']);
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
        $twoBucket = new TwoBucket($buckOne, $buckTwo, $goal, $starterBuck);
        $result = $twoBucket->solve();

        $this->assertEquals(18, $result['moves']);
        $this->assertEquals('two', $result['goalBucket']);
        $this->assertEquals(7, $result['otherBucket']);
    }

    /**
     * uuid: 0ee1f57e-da84-44f7-ac91-38b878691602
     */
    public function testMeasureOneStepUsingBucketOneOfSize1AndBucketTwoOfSize3StartWithBucketTwo(): void
    {
        $twoBucket = new TwoBucket(1, 3, 3, 'two');
        $result = $twoBucket->solve();

        $this->assertEquals(1, $result['moves']);
        $this->assertEquals('two', $result['goalBucket']);
        $this->assertEquals(0, $result['otherBucket']);
    }

    /**
     * uuid: eb329c63-5540-4735-b30b-97f7f4df0f84
     */
    public function testMeasureUsingBucketOneOfSize2AndBucketTwoOfSize3StartWithBucketOneAndEndWithBucketTwo(): void
    {
        $twoBucket = new TwoBucket(2, 3, 3, 'one');
        $result = $twoBucket->solve();

        $this->assertEquals(2, $result['moves']);
        $this->assertEquals('two', $result['goalBucket']);
        $this->assertEquals(2, $result['otherBucket']);
    }

    /**
     * uuid: 449be72d-b10a-4f4b-a959-ca741e333b72
     */
    public function testReachabilityNotPossibleToReachGoalStartWithBucketOne(): void
    {
        $buckOne = 6;
        $buckTwo = 15;
        $this->expectException(Exception::class);
        $twoBucket = new TwoBucket($buckOne, $buckTwo, 5, 'one');
        $twoBucket->solve();
    }

    /**
     * uuid: aac38b7a-77f4-4d62-9b91-8846d533b054
     */
    public function testReachabilityNotPossibleToReachGoalStartWithBucketOneAndEndWithBucketTwo(): void
    {
        $twoBucket = new TwoBucket(6, 15, 9, 'one');
        $result = $twoBucket->solve();

        $this->assertEquals(10, $result['moves']);
        $this->assertEquals('two', $result['goalBucket']);
        $this->assertEquals(0, $result['otherBucket']);
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
        $twoBucket = new TwoBucket($buckOne, $buckTwo, $goal, $starterBuck);
        $result = $twoBucket->solve();

        $this->assertEquals(10, $result['moves']);
        $this->assertEquals('two', $result['goalBucket']);
        $this->assertEquals(0, $result['otherBucket']);
    }

    /**
     * uuid: 74633132-0ccf-49de-8450-af4ab2e3b299
     */
    public function testGoalLargerThanBothBucketsIsImpossible(): void
    {
        $this->expectException(Exception::class);
        $twoBucket = new TwoBucket(5, 7, 8, 'one');
        $twoBucket->solve();
    }
}
