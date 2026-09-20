<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ComplexNumbersTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ComplexNumbers.php';
    }

    /**
     * uuid 9f98e133-eb7f-45b0-9676-cce001cd6f7a
     */
    #[TestDox('Real part -> Real part of a purely real number')]
    public function testRealPartRealPartOfAPurelyRealNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(1, 0);
        $expected = 1;

        $this->assertEquals($expected, $ComplexNumber->real);
    }

    /**
     * uuid 07988e20-f287-4bb7-90cf-b32c4bffe0f3
     */
    #[TestDox('Real part -> Real part of a purely imaginary number')]
    public function testRealPartRealPartOfAPurelyImaginaryNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(0, 1);
        $expected = 0;

        $this->assertEquals($expected, $ComplexNumber->real);
    }

    /**
     * uuid 4a370e86-939e-43de-a895-a00ca32da60a
     */
    #[TestDox('Real part -> Real part of a number with real and imaginary part')]
    public function testRealPartRealPartOfANumberWithRealAndImaginaryPart(): void
    {
        $ComplexNumber = new ComplexNumbers(1, 2);
        $expected = 1;

        $this->assertEquals($expected, $ComplexNumber->real);
    }

    /**
     * uuid 9b3fddef-4c12-4a99-b8f8-e3a42c7ccef6
     */
    #[TestDox('Imaginary part -> Imaginary part of a purely real number')]
    public function testImaginaryPartImaginaryPartOfAPurelyRealNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(1, 0);
        $expected = 0;

        $this->assertEquals($expected, $ComplexNumber->imaginary);
    }

    /**
     * uuid a8dafedd-535a-4ed3-8a39-fda103a2b01e
     */
    #[TestDox('Imaginary part -> Imaginary part of a purely imaginary number')]
    public function testImaginaryPartImaginaryPartOfAPurelyImaginaryNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(0, 1);
        $expected = 1;

        $this->assertEquals($expected, $ComplexNumber->imaginary);
    }

    /**
     * uuid 0f998f19-69ee-4c64-80ef-01b086feab80
     */
    #[TestDox('Imaginary part -> Imaginary part of a number with real and imaginary part')]
    public function testImaginaryPartImaginaryPartOfANumberWithRealAndImaginaryPart(): void
    {
        $ComplexNumber = new ComplexNumbers(1, 2);
        $expected = 2;

        $this->assertEquals($expected, $ComplexNumber->imaginary);
    }

    /**
     * uuid a39b7fd6-6527-492f-8c34-609d2c913879
     */
    #[TestDox('Imaginary unit')]
    public function testImaginaryUnit(): void
    {
        $ComplexNumber1 = new ComplexNumbers(0, 1);
        $ComplexNumber2 = new ComplexNumbers(0, 1);
        $expected = new ComplexNumbers(-1, 0);

        $this->assertEquals($expected, $ComplexNumber1->mul($ComplexNumber2));
    }

    /**
     * uuid 9a2c8de9-f068-4f6f-b41c-82232cc6c33e
     */
    #[TestDox('Arithmetic -> Addition -> Add purely real numbers')]
    public function testArithmeticAdditionAddPurelyRealNumbers(): void
    {
        $ComplexNumber1 = new ComplexNumbers(1, 0);
        $ComplexNumber2 = new ComplexNumbers(2, 0);
        $expected = new ComplexNumbers(3, 0);

        $this->assertEquals($expected, $ComplexNumber1->add($ComplexNumber2));
    }

    /**
     * uuid 657c55e1-b14b-4ba7-bd5c-19db22b7d659
     */
    #[TestDox('Arithmetic -> Addition -> Add purely imaginary numbers')]
    public function testArithmeticAdditionAddPurelyImaginaryNumbers(): void
    {
        $ComplexNumber1 = new ComplexNumbers(0, 1);
        $ComplexNumber2 = new ComplexNumbers(0, 2);
        $expected = new ComplexNumbers(0, 3);

        $this->assertEquals($expected, $ComplexNumber1->add($ComplexNumber2));
    }

    /**
     * uuid 4e1395f5-572b-4ce8-bfa9-9a63056888da
     */
    #[TestDox('Arithmetic -> Addition -> Add numbers with real and imaginary part')]
    public function testArithmeticAdditionAddNumbersWithRealAndImaginaryPart(): void
    {
        $ComplexNumber1 = new ComplexNumbers(1, 2);
        $ComplexNumber2 = new ComplexNumbers(3, 4);
        $expected = new ComplexNumbers(4, 6);

        $this->assertEquals($expected, $ComplexNumber1->add($ComplexNumber2));
    }

    /**
     * uuid 1155dc45-e4f7-44b8-af34-a91aa431475d
     */
    #[TestDox('Arithmetic -> Subtraction -> Subtract purely real numbers')]
    public function testArithmeticSubtractionSubtractPurelyRealNumbers(): void
    {
        $ComplexNumber1 = new ComplexNumbers(1, 0);
        $ComplexNumber2 = new ComplexNumbers(2, 0);
        $expected = new ComplexNumbers(-1, 0);

        $this->assertEquals($expected, $ComplexNumber1->sub($ComplexNumber2));
    }

    /**
     * uuid f95e9da8-acd5-4da4-ac7c-c861b02f774b
     */
    #[TestDox('Arithmetic -> Subtraction -> Subtract purely imaginary numbers')]
    public function testArithmeticSubtractionSubtractPurelyImaginaryNumbers(): void
    {
        $ComplexNumber1 = new ComplexNumbers(0, 1);
        $ComplexNumber2 = new ComplexNumbers(0, 2);
        $expected = new ComplexNumbers(0, -1);

        $this->assertEquals($expected, $ComplexNumber1->sub($ComplexNumber2));
    }

    /**
     * uuid f876feb1-f9d1-4d34-b067-b599a8746400
     */
    #[TestDox('Arithmetic -> Subtraction -> Subtract numbers with real and imaginary part')]
    public function testArithmeticSubtractionSubtractNumbersWithRealAndImaginaryPart(): void
    {
        $ComplexNumber1 = new ComplexNumbers(1, 2);
        $ComplexNumber2 = new ComplexNumbers(3, 4);
        $expected = new ComplexNumbers(-2, -2);

        $this->assertEquals($expected, $ComplexNumber1->sub($ComplexNumber2));
    }

    /**
     * uuid 8a0366c0-9e16-431f-9fd7-40ac46ff4ec4
     */
    #[TestDox('Arithmetic -> Multiplication -> Multiply purely real numbers')]
    public function testArithmeticMultiplicationMultiplyPurelyRealNumbers(): void
    {
        $ComplexNumber1 = new ComplexNumbers(1, 0);
        $ComplexNumber2 = new ComplexNumbers(2, 0);
        $expected = new ComplexNumbers(2, 0);

        $this->assertEquals($expected, $ComplexNumber1->mul($ComplexNumber2));
    }

    /**
     * uuid e560ed2b-0b80-4b4f-90f2-63cefc911aaf
     */
    #[TestDox('Arithmetic -> Multiplication -> Multiply purely imaginary numbers')]
    public function testArithmeticMultiplicationMultiplyPurelyImaginaryNumbers(): void
    {
        $ComplexNumber1 = new ComplexNumbers(0, 1);
        $ComplexNumber2 = new ComplexNumbers(0, 2);
        $expected = new ComplexNumbers(-2, 0);

        $this->assertEquals($expected, $ComplexNumber1->mul($ComplexNumber2));
    }

    /**
     * uuid 4d1d10f0-f8d4-48a0-b1d0-f284ada567e6
     */
    #[TestDox('Arithmetic -> Multiplication -> Multiply numbers with real and imaginary part')]
    public function testArithmeticMultiplicationMultiplyNumbersWithRealAndImaginaryPart(): void
    {
        $ComplexNumber1 = new ComplexNumbers(1, 2);
        $ComplexNumber2 = new ComplexNumbers(3, 4);
        $expected = new ComplexNumbers(-5, 10);

        $this->assertEquals($expected, $ComplexNumber1->mul($ComplexNumber2));
    }

    /**
     * uuid b0571ddb-9045-412b-9c15-cd1d816d36c1
     */
    #[TestDox('Arithmetic -> Division -> Divide purely real numbers')]
    public function testArithmeticDivisionDividePurelyRealNumbers(): void
    {
        $ComplexNumber1 = new ComplexNumbers(1, 0);
        $ComplexNumber2 = new ComplexNumbers(2, 0);
        $expected = new ComplexNumbers(0.5, 0);

        $this->assertEquals($expected, $ComplexNumber1->div($ComplexNumber2));
    }

    /**
     * uuid 5bb4c7e4-9934-4237-93cc-5780764fdbdd
     */
    #[TestDox('Arithmetic -> Arithmetic -> Division -> Divide purely imaginary numbers')]
    public function testArithmeticDivisionDividePurelyImaginaryNumbers(): void
    {
        $ComplexNumber1 = new ComplexNumbers(0, 1);
        $ComplexNumber2 = new ComplexNumbers(0, 2);
        $expected = new ComplexNumbers(0.5, 0);

        $this->assertEquals($expected, $ComplexNumber1->div($ComplexNumber2));
    }

    /**
     * uuid c4e7fef5-64ac-4537-91c2-c6529707701f
     */
    #[TestDox('Arithmetic -> Division -> Divide numbers with real and imaginary part')]
    public function testArithmeticDivisionDivideNumbersWithRealAndImaginaryPart(): void
    {
        $ComplexNumber1 = new ComplexNumbers(1, 2);
        $ComplexNumber2 = new ComplexNumbers(3, 4);
        $expected = new ComplexNumbers(0.44, 0.08);

        $this->assertEquals($expected, $ComplexNumber1->div($ComplexNumber2));
    }


    /**
     * uuid c56a7332-aad2-4437-83a0-b3580ecee843
     */
    #[TestDox('Absolute value -> Absolute value of a positive purely real number')]
    public function testAbsoluteValueAbsoluteValueOfAPositivePurelyRealNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(5, 0);
        $expected = 5;

        $this->assertEquals($expected, $ComplexNumber->abs());
    }

    /**
     * uuid cf88d7d3-ee74-4f4e-8a88-a1b0090ecb0c
     */
    #[TestDox('Absolute value -> Absolute value of a negative purely real number')]
    public function testAbsoluteValueAbsoluteValueOfANegativePurelyRealNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(-5, 0);
        $expected = 5;

        $this->assertEquals($expected, $ComplexNumber->abs());
    }

    /**
     * uuid bbe26568-86c1-4bb4-ba7a-da5697e2b994
     */
    #[TestDox('Absolute value -> Absolute value of a purely imaginary number with positive imaginary part')]
    public function testAbsoluteValueAbsoluteValueOfAPurelyImaginaryNumberWithPositiveImaginaryPart(): void
    {
        $ComplexNumber = new ComplexNumbers(0, 5);
        $expected = 5;

        $this->assertEquals($expected, $ComplexNumber->abs());
    }

    /**
     * uuid 3b48233d-468e-4276-9f59-70f4ca1f26f3
     */
    #[TestDox('Absolute value -> Absolute value of a purely imaginary number with negative imaginary part')]
    public function testAbsoluteValueAbsoluteValueOfAPurelyImaginaryNumberWithNegativeImaginaryPart(): void
    {
        $ComplexNumber = new ComplexNumbers(0, -5);
        $expected = 5;

        $this->assertEquals($expected, $ComplexNumber->abs());
    }

    /**
     * uuid fe400a9f-aa22-4b49-af92-51e0f5a2a6d3
     */
    #[TestDox('Absolute value -> Absolute value of a number with real and imaginary part')]
    public function testAbsoluteValueAbsoluteValueOfANumberWithRealAndImaginaryPart(): void
    {
        $ComplexNumber = new ComplexNumbers(3, 4);
        $expected = 5;

        $this->assertEquals($expected, $ComplexNumber->abs());
    }

    /**
     * uuid fb2d0792-e55a-4484-9443-df1eddfc84a2
     */
    #[TestDox('Complex conjugate -> Conjugate a purely real number')]
    public function testComplexConjugateConjugateAPurelyRealNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(5, 0);
        $expected = new ComplexNumbers(5, 0);

        $this->assertEquals($expected, $ComplexNumber->conjugate());
    }

    /**
     * uuid e37fe7ac-a968-4694-a460-66cb605f8691
     */
    #[TestDox('Complex conjugate -> Conjugate a purely imaginary number')]
    public function testComplexConjugateConjugateAPurelyImaginaryNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(0, 5);
        $expected = new ComplexNumbers(0, -5);

        $this->assertEquals($expected, $ComplexNumber->conjugate());
    }

    /**
     * uuid f7704498-d0be-4192-aaf5-a1f3a7f43e68
     */
    #[TestDox('Complex conjugate -> Conjugate a number with real and imaginary part')]
    public function testComplexConjugateConjugateANumberWithRealAndImaginaryPart(): void
    {
        $ComplexNumber = new ComplexNumbers(1, 1);
        $expected = new ComplexNumbers(1, -1);

        $this->assertEquals($expected, $ComplexNumber->conjugate());
    }

    /**
     * uuid 6d96d4c6-2edb-445b-94a2-7de6d4caaf60
     */
    #[TestDox("Complex exponential function -> Euler's identity/formula")]
    public function testComplexExponentialFunctionEulersIdentityFormula(): void
    {
        $ComplexNumber = new ComplexNumbers(0, M_PI);
        $expected = new ComplexNumbers(-1, 0);

        $this->assertEqualsWithDelta($expected, $ComplexNumber->exp(), 1e-10);
    }

    /**
     * uuid 2d2c05a0-4038-4427-a24d-72f6624aa45f
     */
    #[TestDox("Complex exponential function -> Exponential of 0")]
    public function testComplexExponentialFunctionExponentialOf0(): void
    {
        $ComplexNumber = new ComplexNumbers(0, 0);
        $expected = new ComplexNumbers(1, 0);

        $this->assertEquals($expected, $ComplexNumber->exp());
    }

    /**
     * uuid ed87f1bd-b187-45d6-8ece-7e331232c809
     */
    #[TestDox("Complex exponential function -> Exponential of a purely real number")]
    public function testComplexExponentialFunctionExponentialOfAPurelyRealNumber(): void
    {
        $ComplexNumber = new ComplexNumbers(1, 0);
        $expected = new ComplexNumbers(M_E, 0);

        $this->assertEquals($expected, $ComplexNumber->exp());
    }

    /**
     * uuid 08eedacc-5a95-44fc-8789-1547b27a8702
     */
    #[TestDox("Complex exponential function -> Exponential of a number with real and imaginary part")]
    public function testComplexExponentialFunctionExponentialOfANumberWithRealAndImaginaryPart(): void
    {
        $ComplexNumber = new ComplexNumbers(M_LN2, M_PI);
        $expected = new ComplexNumbers(-2, 0);

        $this->assertEqualsWithDelta($expected, $ComplexNumber->exp(), 1e-10);
    }

    /**
     * uuid d2de4375-7537-479a-aa0e-d474f4f09859
     */
    #[TestDox("Complex exponential function -> Exponential resulting in a number with real and imaginary part")]
    public function testComplexExponentialFunctionExponentialResultingInANumberWithRealAndImaginaryPart(): void
    {
        $ComplexNumber = new ComplexNumbers(M_LN2 / 2, M_PI_4);
        $expected = new ComplexNumbers(1, 1);

        $this->assertEqualsWithDelta($expected, $ComplexNumber->exp(), 1e-10);
    }

    /**
     * uuid 06d793bf-73bd-4b02-b015-3030b2c952ec
     */
    #[TestDox("Operations between real numbers and complex numbers -> Add real number to complex number")]
    public function testOperationsBetweenRealNumbersAndComplexNumbersAddRealNumberToComplexNumber(): void
    {
        $realNumber = 5;
        $ComplexNumber = new ComplexNumbers(1, 2);
        $expected = new ComplexNumbers(6, 2);

        $this->assertEquals($expected, $ComplexNumber->addR($ComplexNumber, $realNumber));
    }

    /**
     * uuid d77dbbdf-b8df-43f6-a58d-3acb96765328
     */
    #[TestDox("Operations between real numbers and complex numbers -> Add complex number to real number")]
    public function testOperationsBetweenRealNumbersAndComplexNumbersAddComplexNumberToRealNumber(): void
    {
        $realNumber = 5;
        $ComplexNumber = new ComplexNumbers(1, 2);
        $expected = new ComplexNumbers(6, 2);

        $this->assertEquals($expected, $ComplexNumber->addR($realNumber, $ComplexNumber));
    }

    /**
     * uuid 20432c8e-8960-4c40-ba83-c9d910ff0a0f
     */
    #[TestDox("Operations between real numbers and complex numbers -> Subtract real number from complex number")]
    public function testOperationsBetweenRealNumbersAndComplexNumbersSubtractRealNumberFromComplexNumber(): void
    {
        $realNumber = 4;
        $ComplexNumber = new ComplexNumbers(5, 7);
        $expected = new ComplexNumbers(1, 7);

        $this->assertEquals($expected, $ComplexNumber->subR($ComplexNumber, $realNumber));
    }

    /**
     * uuid b4b38c85-e1bf-437d-b04d-49bba6e55000
     */
    #[TestDox("Operations between real numbers and complex numbers -> Subtract complex number from real number")]
    public function testOperationsBetweenRealNumbersAndComplexNumbersSubtractComplexNumberFromRealNumber(): void
    {
        $realNumber = 4;
        $ComplexNumber = new ComplexNumbers(5, 7);
        $expected = new ComplexNumbers(-1, -7);

        $this->assertEquals($expected, $ComplexNumber->subR($realNumber, $ComplexNumber));
    }

    /**
     * uuid dabe1c8c-b8f4-44dd-879d-37d77c4d06bd
     */
    #[TestDox("Operations between real numbers and complex numbers -> Multiply complex number by real number")]
    public function testOperationsBetweenRealNumbersAndComplexNumbersMultiplyComplexNumberByRealNumber(): void
    {
        $realNumber = 5;
        $ComplexNumber = new ComplexNumbers(2, 5);
        $expected = new ComplexNumbers(10, 25);

        $this->assertEquals($expected, $ComplexNumber->mulR($ComplexNumber, $realNumber));
    }

    /**
     * uuid 6c81b8c8-9851-46f0-9de5-d96d314c3a28
     */
    #[TestDox("Operations between real numbers and complex numbers -> Multiply real number by complex number")]
    public function testOperationsBetweenRealNumbersAndComplexNumbersMultiplyRealNumberByComplexNumber(): void
    {
        $realNumber = 5;
        $ComplexNumber = new ComplexNumbers(2, 5);
        $expected = new ComplexNumbers(10, 25);

        $this->assertEquals($expected, $ComplexNumber->mulR($realNumber, $ComplexNumber));
    }

    /**
     * uuid 8a400f75-710e-4d0c-bcb4-5e5a00c78aa0
     */
    #[TestDox("Operations between real numbers and complex numbers -> Divide complex number by real number")]
    public function testOperationsBetweenRealNumbersAndComplexNumbersDivideComplexNumberByRealNumber(): void
    {
        $realNumber = 10;
        $ComplexNumber = new ComplexNumbers(10, 100);
        $expected = new ComplexNumbers(1, 10);

        $this->assertEquals($expected, $ComplexNumber->divR($ComplexNumber, $realNumber));
    }

    /**
     * uuid 9a867d1b-d736-4c41-a41e-90bd148e9d5e
     */
    #[TestDox("Operations between real numbers and complex numbers -> Divide real number by complex number")]
    public function testOperationsBetweenRealNumbersAndComplexNumbersDivideRealNumberByComplexNumber(): void
    {
        $realNumber = 5;
        $ComplexNumber = new ComplexNumbers(1, 1);
        $expected = new ComplexNumbers(2.5, -2.5);

        $this->assertEquals($expected, $ComplexNumber->divR($realNumber, $ComplexNumber));
    }
}
