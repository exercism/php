# About

PHP provides a number of operators for performing arithmetic operations. PHP follows the standard mathematical order of operations for its arithmetic operators. The operators that are provided by PHP are:

* Identity (+)
* Negation (-)
* Addition (+)
* Subtraction (-)
* Multiplication (*)
* Division (/)
* Modulo (%)
* Exponentiation (**)

Let's take a look at each and how they could be used:

## Identity (+)

The identity operator (+) works on a single value (unary operator). It will resolve to the `float` or `int` value of the variable.

```php
$value = '42';
$answer = +$value; // 42 (int)
```

## Negation (-)

The negation operator works on a single value (unary operator) and returns the opposite of the numeric value.

```php
$forward = 65;
$reverse = -$forward; // -65
```

## Addition (+) and Subtraction (-)

The addition operator will add the two values on either side of it while the subtraction operator will subtract the right value from the left value.

```php
$apples = 5;
$yourApples = 0;

$apples = $apples - 2; // 3
$yourApples = $yourApples + 2; 2
```

## Division (/)

The division operator gives the result of dividing the left value by the right value. If the right value is 0, it will cause a `DivisionByZeroError` error. 

```php
$slicesOfPizza = 8;
$people = 4;
$slicesPerPerson = $slicesOfPizza / $people; // 2
```

## Multiplication (*)

The multiplication operator returns the result of multiplying the left and right values together.

```php
$tires = 4;
$priceOfTire = 250;
$totalCost = $tires * $priceOfTire; // 1000
```

## Modulo (%)

The modulo operator returns the remainder when the left value is divided by the right value. This operator very useful for determining if a number evenly divides into another, determining if a value is even or odd and a lot more.

```php
$value = 3;
$isOdd = $value % 2;
if ($isOdd === 1) {
    echo 'Yes, it is odd!';
} else {
    echo 'It is even.';
}
```

## Exponentiation (**)

The exponentiation operator is used to raise the left value to the power of the right value. Prior to PHP 5.6 you would need to use the `pow` function to perform the same thing. 

```php
$sideLength = 13;
$areaOfSquare = $sideLength ** 2; // 169
```

The exponentiation operator supports integers and floats for both sides, so you could use it to calculate square roots (or other roots) or more complex exponential values.

```php
$squareArea = 144;
$side = $squareArea ** .5; // 12
```

## Order of Operations

PHP follows the standard order of operations for math. This means that rather that performing operations left to right, each operator has a precedence and the operations are resolved according to their precedence. The order of oeprations is:

* parentheses
* exponentiation
* multiplication, division
* addition, subtraction

Multiplication and division are at the same level of precedence as each other. Similarly, addition and subtraction are at the same level of precence.

This means the value below would be 17 instead of 10, since multiplication has a higher precedence than addition:

```php
$value = 2 + 3 * 5;
```

PHP also provides a number of helpful assignment operators that combine arithmetic operators with assigment when you are perfoming an operation on a variable and assigning the result back to itself. These will be covered in the `Assignment Operators` concept.
