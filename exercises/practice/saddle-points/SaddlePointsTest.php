<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class SaddlePointsTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SaddlePoints.php';
    }

    /**
     * uuid: 3e374e63-a2e0-4530-a39a-d53c560382bd
     */
    #[TestDox('Can identify single saddle point')]
    public function testCanIdentifySingleSaddlePoint(): void
    {
        $matrix = [
          [9, 8, 7],
          [5, 3, 2],
          [6, 6, 7]
        ];
        $expected = [
            [
                "row"    => 2,
                "column" => 1
            ]
        ];
        $this->assertEquals($expected, saddlePoints($matrix));
    }

    /**
     * uuid: 6b501e2b-6c1f-491f-b1bb-7f278f760534
     */
    #[TestDox('Can identify that empty matrix has no saddle points')]
    public function testCanIdentifyThatEmptyMatrixHasNoSaddlePoints(): void
    {
        $matrix = [[]];
        $expected = [];
        $this->assertEquals($expected, saddlePoints($matrix));
    }

    /**
     * uuid: 8c27cc64-e573-4fcb-a099-f0ae863fb02f
     */
    #[TestDox('Can identify lack of saddle points when there are none')]
    public function testCanIdentifyLackOfSaddlePointsWhenThereAreNone(): void
    {
        $matrix = [
            [1, 2, 3],
            [3, 1, 2],
            [2, 3, 1]
        ];
        $expected = [];
        $this->assertEquals($expected, saddlePoints($matrix));
    }

    /**
     * uuid: 6d1399bd-e105-40fd-a2c9-c6609507d7a3
     */
    #[TestDox('Can identify multiple saddle points in a column')]
    public function testCanIdentifyMultipleSaddlePointsInAColumn(): void
    {
        $matrix = [
            [4, 5, 4],
            [3, 5, 5],
            [1, 5, 4]
        ];
        $expected = [
            [
                "row"    => 1,
                "column" => 2
            ],
            [
                "row"    => 2,
                "column" => 2
            ],
            [
                "row"    => 3,
                "column" => 2
            ]
        ];
        $this->assertEquals($expected, saddlePoints($matrix));
    }

    /**
     * uuid: 3e81dce9-53b3-44e6-bf26-e328885fd5d1
     */
    #[TestDox('Can identify multiple saddle points in a row')]
    public function testCanIdentifyMultipleSaddlePointsInARow(): void
    {
        $matrix = [
            [6, 7, 8],
            [5, 5, 5],
            [7, 5, 6]
        ];
        $expected = [
            [
                "row"    => 2,
                "column" => 1
            ],
            [
                "row"    => 2,
                "column" => 2
            ],
            [
                "row"    => 2,
                "column" => 3
            ]
        ];
        $this->assertEquals($expected, saddlePoints($matrix));
    }

    /**
     * uuid: 88868621-b6f4-4837-bb8b-3fad8b25d46b
     */
    #[TestDox('Can identify saddle point in bottom right corner')]
    public function testCanIdentifySaddlePointInBottomRightCorner(): void
    {
        $matrix = [
            [8, 7, 9],
            [6, 7, 6],
            [3, 2, 5]
        ];
        $expected = [
            [
                "row"    => 3,
                "column" => 3
            ]
        ];
        $this->assertEquals($expected, saddlePoints($matrix));
    }

    /**
     * uuid: 5b9499ca-fcea-4195-830a-9c4584a0ee79
     */
    #[TestDox('Can identify saddle points in a non square matrix')]
    public function testCanIdentifySaddlePointsInANonSquareMatrix(): void
    {
        $matrix = [
            [3, 1, 3],
            [3, 2, 4]
        ];
        $expected = [
            [
                "row"    => 1,
                "column" => 1
            ],
            [
                "row"    => 1,
                "column" => 3
            ]
        ];
        $this->assertEquals($expected, saddlePoints($matrix));
    }

    /**
     * uuid: ee99ccd2-a1f1-4283-ad39-f8c70f0cf594
     */
    #[TestDox('Can identify that saddle points in a single column matrix are those with the minimum value')]
    public function testCanIdentifyThatSaddlePointsInASingleColumnMatrixAreThoseWithTheMinimumValue(): void
    {
        $matrix = [
            [2],
            [1],
            [4],
            [1]
        ];
        $expected = [
            [
                "row"    => 2,
                "column" => 1
            ],
            [
                "row"    => 4,
                "column" => 1
            ]
        ];
        $this->assertEquals($expected, saddlePoints($matrix));
    }

    /**
     * uuid: 63abf709-a84b-407f-a1b3-456638689713
     */
    #[TestDox('Can identify that saddle points in a single row matrix are those with the maximum value')]
    public function testCanIdentifyThatSaddlePointsInASingleRowMatrixAreThoseWithTheMaximumValue(): void
    {
        $matrix = [
            [2, 5, 3, 5]
        ];
        $expected = [
            [
                "row"    => 1,
                "column" => 2
            ],
            [
                "row"    => 1,
                "column" => 4
            ]
        ];
        $this->assertEquals($expected, saddlePoints($matrix));
    }
}
