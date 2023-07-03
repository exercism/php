# Booleans

The `bool` type (short for boolean) has only two values -- `true` and `false`.
The `true` and `false` literal values are case insensitive in code.

```php
<?php

$value_is_true = true;
$value_is_false = false;
```

Boolean values are often use in logical expressions as the result of an operator and then used in control structures.

## Logical Operators

There are several logical operators:

- `!$a`: returns `true` if `$a` is not `true`
- `$a && $b`: returns `true` if `$a` and `$b` are both `true`
- `$a || $b`: returns `true` if either `$a` or `$b` are `true`

~~~~exercism/caution
There is an `and` and `or` operator and they are complementary to `&&` and `||` respectively.
They do not have the same behaviour as `&&` and `||` and may produce unexpected results, and as such their use is discouraged.
~~~~
