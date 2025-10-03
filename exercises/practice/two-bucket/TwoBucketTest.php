<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class TwoBucketTest extends TestCase
{
    private TwoBucket $twoBucket;

    public static function setUpBeforeClass(): void
    {
        require_once 'TwoBucket.php';
    }

    /** uuid: a6f2b4ba-065f-4dca-b6f0-e3eee51cb661 */
    #[TestDox('Measure using bucket one of size 3 and bucket two of size 5 - start with bucket one')]
    public function testMeasureUsingBucketOneOfSize3AndBucketTwoOfSize5StartWithBucketOne(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(3, 5, 1, 'one');

        $this->assertEquals(4, $solution->numberOfActions);
        $this->assertEquals('one', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(5, $solution->litersLeftInOtherBucket);
    }

    /** uuid: 6c4ea451-9678-4926-b9b3-68364e066d40 */
    #[TestDox('Measure using bucket one of size 3 and bucket two of size 5 - start with bucket two')]
    public function testMeasureUsingBucketOneOfSize3AndBucketTwoOfSize5StartWithBucketTwo(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(3, 5, 1, 'two');

        $this->assertEquals(8, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(3, $solution->litersLeftInOtherBucket);
    }

    /** uuid: 3389f45e-6a56-46d5-9607-75aa930502ff */
    #[TestDox('Measure using bucket one of size 7 and bucket two of size 11 - start with bucket one')]
    public function testMeasureUsingBucketOneOfSize7AndBucketTwoOfSize11StartWithBucketOne(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(7, 11, 2, 'one');

        $this->assertEquals(14, $solution->numberOfActions);
        $this->assertEquals('one', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(11, $solution->litersLeftInOtherBucket);
    }

    /** uuid: fe0ff9a0-3ea5-4bf7-b17d-6d4243961aa1 */
    #[TestDox('Measure using bucket one of size 7 and bucket two of size 11 - start with bucket two')]
    public function testMeasureUsingBucketOneOfSize7AndBucketTwoOfSize11StartWithBucketTwo(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(7, 11, 2, 'two');

        $this->assertEquals(18, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(7, $solution->litersLeftInOtherBucket);
    }

    /** uuid: 0ee1f57e-da84-44f7-ac91-38b878691602 */
    #[TestDox('Measure one step using bucket one of size 1 and bucket two of size 3 - start with bucket two')]
    public function testMeasureOneStepUsingBucketOneOfSize1AndBucketTwoOfSize3StartWithBucketTwo(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(1, 3, 3, 'two');

        $this->assertEquals(1, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(0, $solution->litersLeftInOtherBucket);
    }

    /** uuid: eb329c63-5540-4735-b30b-97f7f4df0f84 */
    #[TestDox('Measure using bucket one of size 2 and bucket two of size 3 - start with bucket one and end with bucket two')]
    public function testMeasureUsingBucketOneOfSize2AndBucketTwoOfSize3StartWithBucketOneAndEndWithBucketTwo(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(2, 3, 3, 'one');

        $this->assertEquals(2, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(2, $solution->litersLeftInOtherBucket);
    }

    /** uuid: 58d70152-bf2b-46bb-ad54-be58ebe94c03 */
    #[TestDox('Measure using bucket one much bigger than bucket two')]
    public function testMeasureUsingBucketOneMuchBiggerThanBucketTwo(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(5, 1, 2, 'one');

        $this->assertEquals(6, $solution->numberOfActions);
        $this->assertEquals('one', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(1, $solution->litersLeftInOtherBucket);
    }

    /** uuid: 9dbe6499-caa5-4a58-b5ce-c988d71b8981 */
    #[TestDox('Measure using bucket one much smaller than bucket two')]
    public function testMeasureUsingBucketOneMuchSmallerThanBucketTwo(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(3, 15, 9, 'one');

        $this->assertEquals(6, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(0, $solution->litersLeftInOtherBucket);
    }

    /** uuid: 449be72d-b10a-4f4b-a959-ca741e333b72 */
    #[TestDox('Not possible to reach the goal')]
    public function testReachabilityNotPossibleToReachGoalStartWithBucketOne(): void
    {
        $this->expectException(Exception::class);

        $subject = new TwoBucket();
        $subject->solve(6, 15, 5, 'one');
    }

    /** uuid: aac38b7a-77f4-4d62-9b91-8846d533b054 */
    #[TestDox('With the same buckets but a different goal, then it is possible')]
    public function testWithSameBucketsButDifferentGoalItIsPossible(): void
    {
        $subject = new TwoBucket();
        $solution = $subject->solve(6, 15, 9, 'one');

        $this->assertEquals(10, $solution->numberOfActions);
        $this->assertEquals('two', $solution->nameOfBucketWithDesiredLiters);
        $this->assertEquals(0, $solution->litersLeftInOtherBucket);
    }

    /** uuid: 74633132-0ccf-49de-8450-af4ab2e3b299 */
    #[TestDox('Goal larger than both buckets is impossible')]
    public function testGoalLargerThanBothBucketsIsImpossible(): void
    {
        $this->expectException(Exception::class);

        $subject = new TwoBucket();
        $subject->solve(5, 7, 8, 'one');
    }
}
