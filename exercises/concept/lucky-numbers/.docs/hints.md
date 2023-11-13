# Hints

## General

- Review the [Type Juggling][ref-type-juggling] reference
- Review the [Integer][ref-type-cast-int] and [String][ref-type-cast-string] type casting reference
- Review the [Numeric Strings][ref-numeric-strings] reference

## 1. Calculate the sum for the numbers on the slot machine

- You can use [`implode`][ref-implode] to combine the digits.
  `implode` will implicitly coerce the digits in the array to strings and return a string.
- To sum the numbers see the [arithmetic operations][ref-arithmetic-ops] concept.
  Arithmetic operators will implicitly coerce strings to integers or floats.

## 2. Determine if a number is a palindrome

- This task can be solved by comparing the number given to its reversed version.
  To do this, you first need to reverse the number given.
  Then return the comparison result of both versions.
- You can use [`strrev`][ref-strrev] to get the reversed number.
  `strrev` will implicitly coerce the number to a string and return a string.
- Finally, you can [compare][ref-comparison-ops] the number given with the reversed string.
  When writing the condition for that, make use of the [comparison][ref-comparison-ops] that does type juggling.
  PHP will coerce the reversed string to a number for this comparison.
- The result of the comparison is a `bool`, which is the type to return.

## 3. Generate an error message for invalid user input

- You can use [if statements][ref-if-statement] to check for the different conditions.
- First, you should cover the case that the value does not contain any characters.
- Next, tackle the case that the input is not a number or `0`.
  Type coercion rules of the [comparison operators][ref-comparison-ops] are against you in this case.
  They make PHP compare strings in some cases and that gives wrong results.
  Use the explicit casting to `int` you learned about in the introduction.
  Then you can rely on the [comparison operators][ref-comparison-ops] for a number larger than `0`.

[ref-type-juggling]: https://www.php.net/manual/en/language.types.type-juggling.php
[ref-type-cast-int]: https://www.php.net/manual/en/language.types.integer.php#language.types.integer.casting.from-string
[ref-type-cast-string]: https://www.php.net/manual/en/language.types.string.php#language.types.string.casting
[ref-numeric-strings]: https://www.php.net/manual/en/language.types.numeric-strings.php
[ref-implode]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/join
[ref-arithmetic-ops]: /tracks/php/concepts/arithmetic-operators
[ref-strrev]: https://www.php.net/manual/en/function.strrev
[ref-comparison-ops]: https://www.php.net/manual/en/language.operators.comparison.php
[ref-if-statement]: https://www.php.net/manual/en/control-structures.if.php
