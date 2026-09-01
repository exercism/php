# Comparison Operators

Comparison operators compare two values.
Most of them return a boolean (`true` or `false`).
The spaceship operator (`<=>`) is different: it returns `-1`, `0`, or `1`.

PHP has ten built-in comparison operators:

| Name | Example | Result |
| --- | --- | --- |
| Equal | `$a == $b` | `true` if `$a` is equal to `$b` after type juggling |
| Identical | `$a === $b` | `true` if `$a` is equal to `$b` and the same type |
| Not Equal | `$a != $b` | `true` if `$a` is not equal to `$b` after type juggling |
| Not Equal | `$a <> $b` | `true` if `$a` is not equal to `$b` after type juggling |
| Not identical | `$a !== $b` | `true` if `$a` is not equal to `$b` or not the same type |
| Less than | `$a < $b` | `true` if `$a` is strictly less than `$b` |
| Greater than | `$a > $b` | `true` if `$a` is strictly greater than `$b` |
| Less than or equal to | `$a <= $b` | `true` if `$a` is less than or equal to `$b` |
| Greater than or equal to | `$a >= $b` | `true` if `$a` is greater than or equal to `$b` |
| Spaceship | `$a <=> $b` | `-1`, `0`, or `1` when `$a` is less than, equal to, or greater than `$b` |

## Equal and identical

PHP distinguishes between **equal** (`==`) and **identical** (`===`).
Identical is also called **strictly equal**.

With `==`, PHP may change the type of a value before comparing (type juggling).
With `===`, both the value and the type must match.

```php
<?php

1 == "1";  // => true, equal after implicit conversion of string to int
1 === "1"; // => false, not identical

1 == 1.0;  // => true, equal after implicit conversion of int to float
1 === 1.0; // => false
```

The same idea applies to "not equal" (`!=` / `<>`) versus "not identical" (`!==`).

## Comparing objects

For objects, `==` checks whether properties are equal.
`===` checks whether both sides refer to the same instance.

```php
<?php

new stdClass() == new stdClass();  // => true
new stdClass() === new stdClass(); // => false
```

## The spaceship operator

`$a <=> $b` returns:

```php
<?php

1 <=> 2; // => -1
1 <=> 1; // => 0
2 <=> 1; // => 1
```

This is useful when you need an ordering result, not only `true` or `false`.
