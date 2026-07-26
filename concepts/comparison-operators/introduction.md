# Comparison Operators

Comparison operators compare two values and usually return a boolean (`true` or `false`).
They are commonly used to make decisions in code.

For learning PHP, start with **identical** comparisons and relational comparisons between numbers:

```php
<?php

5 === 5; // => true
5 !== 0; // => true
3 < 7;   // => true
9 > 2;   // => true
5 <= 5;  // => true
4 >= 8;  // => false
```

| Operator | Meaning |
| --- | --- |
| `$a === $b` | identical: equal and the same type |
| `$a !== $b` | not identical |
| `$a < $b` | less than |
| `$a > $b` | greater than |
| `$a <= $b` | less than or equal to |
| `$a >= $b` | greater than or equal to |

## The spaceship operator

The spaceship operator (`<=>`) also compares two values, but it returns an integer instead of a boolean:

- `-1` when the left value is less than the right value
- `0` when both values are equal
- `1` when the left value is greater than the right value

```php
<?php

3 <=> 7; // => -1
5 <=> 5; // => 0
9 <=> 2; // => 1
```

## Using comparisons in an `if` statement

A comparison can be used as the condition of an `if` statement.
If the comparison is `true`, the code inside the braces runs:

```php
<?php

if ($value === 10) {
    return 0.77;
}

if ($value >= 5) {
    return 0.9;
}
```
