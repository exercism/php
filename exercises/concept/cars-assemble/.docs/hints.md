# Hints

## General

- The introduction covers the comparison operators you need for this exercise.
- You may also review the [comparison operators][comparison-operators] documentation.

## 1. Calculate the success rate

- Compare `$speed` with the boundary values from the table.
- Use `identity`, `greater than`, `greater or equal`, `lower than`, `lower or equal` operators as needed.
- You can use an `if` statement to return the matching success rate.

## 2. Calculate the production rate per hour

- Reuse the `successRate()` method you wrote earlier: `$this->successRate($speed)`.
- Multiply `221`, `$speed`, and the success rate.
- PHP can multiply integers and floating-point numbers together; the result may be a float.

## 3. Check whether the line is running

- Use a not-identical comparison (`!==`) against `0`.
- Return the boolean result of that comparison.

## 4. Compare two line speeds

- The spaceship operator (`<=>`) returns `-1`, `0`, or `1` directly.

[comparison-operators]: https://www.php.net/manual/en/language.operators.comparison.php
