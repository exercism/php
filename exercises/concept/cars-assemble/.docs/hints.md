# Hints

## General

- Review the [comparison operators][comparison-operators] and [control structures][if-statement] documentation.

## 1. Calculate the success rate

- Determining the success rate can be done through a [conditional statement][if-statement].
- Numbers can be compared using the built-in [comparison operators][comparison-operators].

## 2. Calculate the production rate per hour

- Use the `CarsAssemble.successRate()` method you wrote earlier to determine the success rate.
- PHP allows multiplication between integers and floating-point numbers.
  The result will be a floating-point number when either operand is a float.

## 3. Calculate the number of working items produced per minute

- Converting a floating-point number to an integer discards the fractional part (truncation toward zero).
- You can cast to an integer with `(int)` or use [`intval()`][intval].

[comparison-operators]: https://www.php.net/manual/en/language.operators.comparison.php
[if-statement]: https://www.php.net/manual/en/control-structures.if.php
[intval]: https://www.php.net/manual/en/function.intval.php
