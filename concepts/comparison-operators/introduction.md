# Comparison Operators

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

