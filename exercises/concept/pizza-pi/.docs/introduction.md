# Introduction

## Integers

Integers are whole numbers that belong to the set `{..., -2, -1, 0, 1, 2, ...}`.
The maximum and minimum values of an integer is determined by the system PHP runs in.
Typically for most modern systems, the integer is a 64-bit value -- meaning it can represent `-9_223_372_036_854_775_808` to `9_223_372_036_854_775_807` inclusive.

```php
<?php

$a = 1234;
$a = 1_234_567;
```

You can write integer literal values in other than base 10 using a base prefix:

```php
<?php

$a = 0123; // octal number (equivalent to 83 decimal)
$a = 0o123; // octal number (as of PHP 8.1.0)
$a = 0x1A; // hexadecimal number (equivalent to 26 decimal)
$a = 0b11111111; // binary number (equivalent to 255 decimal)
```

> Taken from PHP's [documentation][syntax]

## Floating Point Numbers

Floating point numbers are used in PHP to represent a subset of real numbers.
They start with one or more digits separated by a decimal separator.

```php
<?php

$a = 1.234; 
$b = 1.2e3; 
$c = 7E-10;
$d = 1_234.567; // as of PHP 7.4.0
```

### Common pitfalls

Not all numbers and arithmetic operations can be performed with floating point numbers.
Using floating point numbers to represent dollars and cents can lead to rounding errors.

```php
<?php

$result = 0.1 + 0.2; // => 0.30000000000000004
```

## Arithmetic Operators

PHP provides a number of operators for performing arithmetic operations. PHP follows the standard mathematical order of operations for its arithmetic operators. The operators that are provided by PHP are:

* Identity (+)
* Negation (-)
* Addition (+)
* Subtraction (-)
* Multiplication (*)
* Division (/)
* Modulo (%)
* Exponentiation (**)

```php
$moles = +'10';
$aLotOfMoles = 6.022 * 10**23 * $moles;
```

[syntax]: https://www.php.net/manual/en/language.types.integer.php#language.types.integer.syntax
