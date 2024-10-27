<?php

declare(strict_types=1);

class CollatzConjectureTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'CollatzConjecture.php';
    }

    /**
     * uuid: 540a3d51-e7a6-47a5-92a3-4ad1838f0bfd
     * @testdox zero steps for one
     */
    public function testZeroStepsForOne(): void
    {
        $this->assertEquals(0, steps(1));
    }

    /**
     * uuid: 3d76a0a6-ea84-444a-821a-f7857c2c1859
     * @testdox divide if even
     */
    public function testDivideIfEven(): void
    {
        $this->assertEquals(4, steps(16));
    }

    /**
     * uuid: 754dea81-123c-429e-b8bc-db20b05a87b9
     * @testdox even and odd steps
     */
    public function testEvenAndOddSteps(): void
    {
        $this->assertEquals(9, steps(12));
    }

    /**
     * uuid: ecfd0210-6f85-44f6-8280-f65534892ff6
     * @testdox large number of even and odd steps
     */
    public function testLargeNumberOfEvenAndOddSteps(): void
    {
        $this->assertEquals(152, steps(1000000));
    }

    /**
     * uuid: 2187673d-77d6-4543-975e-66df6c50e2da
     * @testdox zero is an error
     */
    public function testZeroIsAnError(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/Only positive (numbers|integers) are allowed/');

        steps(0);
    }

    /**
     * uuid: ec11f479-56bc-47fd-a434-bcd7a31a7a2e
     * @testdox negative value is an error
     */
    public function testNegativeValueIsAnError(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/Only positive (numbers|integers) are allowed/');

        steps(-1);
    }
}
