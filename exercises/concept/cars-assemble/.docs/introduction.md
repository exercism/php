# Introduction

## Comparison Operators

PHP has ten built in comparison operators:

| Name  | Example    | Result                                             |
| ----- | ---------- | -------------------------------------------------- |
| Equal | `$a == $b` | true if `$a` is equal to `$b` after type juggling. |
| Identical | `$a === $b` | true if `$a` is equal to `$b` and the same type. |
| Not Equal | `$a != $b` | true if `$a` is not equal to `$b` after type juggling. |
| Not Equal | `$a <> $b` | true if `$a` is not equal to `$b` after type juggling. |
| Not identical | `$a !== $b` | true if `$a` is not equal to `$b` or not of the same type. |
| Less than | `$a < $b` | true if `$a` is strictly less than `$b`. |
| Greater than | `$a > $b` | true if `$a` is strictly greater than `$b`. |
| Less than or equal to | `$a <= $b` | true if `$a` is less than or equal to `$b`. |
| Greater than or equal to | `$a >= $b` | true if `$a` is greater than or equal to `$b`. |
| Spaceship | `$a <=> $b` | returns an integer less than, equal to, or greater than `0`i when `$a`. |

PHP has distinct definitions that differentiate between `equal` and `identical`.
Sometimes `identical` is also referred to as `strictly equal`.

```php
<?php

// Comparisons between integer and numeric string values
1 == "1"; // => true, equal
1 === "1"; // => false, not identical

// Comparisons between integers and floating point values
1 == 1.0; // => true
1 === 1.0; // => false

// Comparisons between object instances
new stdClass() == new stdClass(); // => true, properties are equal
new stdClass() === new stdClass(); // => false, references are not identical
```

## If, Else, Elseif

Conditional statements using `if`, `elseif`, and `else` are a fundamental parts of program control flow.
The `if` statement evaluates an expression, and if `true`, will execute the code branch.

```php
<?php

if ($expression) {
    // .. executed if $expression is true
}
```

If the expression is not a boolean value, the evaluation determines the value's "truthiness" or "not falsiness".
In PHP, the following values are considered equal to false:

- boolean `false`
- integer `0`
- float `0.0` and `-0.0`
- an empty array `[]`
- an empty string `""` or a numeric string `"0"`
- `null`

All other values are considered true.

### Responding to multiple conditions

Following an `if` statement, you may chain multiple conditions using `elseif` and `else`.

```php
<?php

if ($value === 0) {
    // .. do something
} elseif ($value === 1) {
    // .. do something else
} else {
    // ,, do this if nothing else
}
```

Only one conditional statement evaluated as true will be executed.
So if multiple conditions may evaluate to true, the order they are written is important.

```php
<?php

if (true) {
    // .. always do something
} elseif (true)
    // .. will never be executed
} else {
    // .. will never be executed
}
```
