<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class KnapsackTest extends TestCase
{
    private Knapsack $knapsack;

    public static function setUpBeforeClass(): void
    {
        require_once 'Knapsack.php';
    }

    protected function setUp(): void
    {
        $this->knapsack = new Knapsack();
    }

    /**
     * uuid: 3993a824-c20e-493d-b3c9-ee8a7753ee59
     */
    public function testNoItems(): void
    {
        $this->assertEquals(0, $this->knapsack->getMaximumValue(100, []));
    }

    /**
     * uuid: 1d39e98c-6249-4a8b-912f-87cb12e506b0
     */
    public function testOneItemTooHeavy(): void
    {
        $items = [[ 'weight' => 100, 'value' => 1 ]];
        $this->assertEquals(0, $this->knapsack->getMaximumValue(10, $items));
    }

    /**
     * uuid: 833ea310-6323-44f2-9d27-a278740ffbd8
     */
    public function testFiveItemsCannotBeGreedyByWeight(): void
    {
        $items = [
            [ 'weight' => 2, 'value' => 5 ],
            [ 'weight' => 2, 'value' => 5 ],
            [ 'weight' => 2, 'value' => 5 ],
            [ 'weight' => 2, 'value' => 5 ],
            [ 'weight' => 10, 'value' => 21 ],
        ];
        $this->assertEquals(21, $this->knapsack->getMaximumValue(10, $items));
    }

    /**
     * uuid: 277cdc52-f835-4c7d-872b-bff17bab2456
     */
    public function testFiveItemsCannotBeGreedyByValue(): void
    {
        $items = [
            [ 'weight' => 2, 'value' => 20 ],
            [ 'weight' => 2, 'value' => 20 ],
            [ 'weight' => 2, 'value' => 20 ],
            [ 'weight' => 2, 'value' => 20 ],
            [ 'weight' => 10, 'value' => 50 ],
        ];
        $this->assertEquals(80, $this->knapsack->getMaximumValue(10, $items));
    }

    /**
     * uuid: 81d8e679-442b-4f7a-8a59-7278083916c9
     */
    public function testExampleKnapsack(): void
    {
        $items = [
            [ 'weight' => 5, 'value' => 10 ],
            [ 'weight' => 4, 'value' => 40 ],
            [ 'weight' => 6, 'value' => 30 ],
            [ 'weight' => 4, 'value' => 50 ],
        ];
        $this->assertEquals(90, $this->knapsack->getMaximumValue(10, $items));
    }

    /**
     * uuid: f23a2449-d67c-4c26-bf3e-cde020f27ecc
     */
    public function testEightItems(): void
    {
        $items = [
            [ 'weight' => 25, 'value' => 350 ],
            [ 'weight' => 35, 'value' => 400 ],
            [ 'weight' => 45, 'value' => 450 ],
            [ 'weight' => 5, 'value' => 20 ],
            [ 'weight' => 25, 'value' => 70 ],
            [ 'weight' => 3, 'value' => 8 ],
            [ 'weight' => 2, 'value' => 5 ],
            [ 'weight' => 2, 'value' => 5 ],
        ];
        $this->assertEquals(900, $this->knapsack->getMaximumValue(104, $items));
    }

    /**
     * uuid: 7c682ae9-c385-4241-a197-d2fa02c81a11
     */
    public function testFifteenItems(): void
    {
        $items = [
            [ 'weight' => 70, 'value' => 135 ],
            [ 'weight' => 73, 'value' => 139 ],
            [ 'weight' => 77, 'value' => 149 ],
            [ 'weight' => 80, 'value' => 150 ],
            [ 'weight' => 82, 'value' => 156 ],
            [ 'weight' => 87, 'value' => 163 ],
            [ 'weight' => 90, 'value' => 173 ],
            [ 'weight' => 94, 'value' => 184 ],
            [ 'weight' => 98, 'value' => 192 ],
            [ 'weight' => 106, 'value' => 201 ],
            [ 'weight' => 110, 'value' => 210 ],
            [ 'weight' => 113, 'value' => 214 ],
            [ 'weight' => 115, 'value' => 221 ],
            [ 'weight' => 118, 'value' => 229 ],
            [ 'weight' => 120, 'value' => 240 ],
        ];
        $this->assertEquals(1458, $this->knapsack->getMaximumValue(750, $items));
    }
}
