<?php

class TransformTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'etl.php';
    }

    public function testTransformOneValue() : void
    {
        $old         = [ '1' => ['A'] ];
        $expected    = [ 'a' => 1 ];
        $this->assertEquals($expected, transform($old));
    }

    public function testTransformMoreValues() : void
    {
        $old         = [ '1' => str_split('AEIOU') ];
        $expected    = [ 'a' => 1, 'e' => 1, 'i' => 1, 'o' => 1, 'u' => 1 ];
        $this->assertEquals($expected, transform($old));
    }

    public function testTransformMoreKeys() : void
    {
        $old         = [ '1' => str_split('AE'), '2' => str_split('DG') ];
        $expected    = [ 'a' => 1, 'e' => 1, 'd' => 2, 'g' => 2 ];
        $this->assertEquals($expected, transform($old));
    }

    public function testTransformFullDataset() : void
    {
        $old = [
            '1' => str_split('AEIOULNRST'),
            '2' => str_split('DG'),
            '3' => str_split('BCMP'),
            '4' => str_split('FHVWY'),
            '5' => str_split('K'),
            '8' => str_split('JX'),
            '10' => str_split('QZ')
        ];
        $expected = [
            'a' => 1, 'b' => 3, 'c' => 3, 'd' => 2, 'e' => 1,
            'f' => 4, 'g' => 2, 'h' => 4, 'i' => 1, 'j' => 8,
            'k' => 5, 'l' => 1, 'm' => 3, 'n' => 1, 'o' => 1,
            'p' => 3, 'q' => 10, 'r' => 1, 's' => 1, 't' => 1,
            'u' => 1, 'v' => 4, 'w' => 4, 'x' => 8, 'y' => 4,
            'z' => 10
        ];
        $this->assertEquals($expected, transform($old));
    }
}
