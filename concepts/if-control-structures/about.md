# If, Elseif, Else

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

## Responding to multiple conditions

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
