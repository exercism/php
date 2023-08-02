# Match Expressions

A match expression evaluates a value and a condition to return an expression to be evaluated.
Much like a ternary, if the condition does not match, the return expression is not evaluated.
To match a condition, an identity [strict equality or `===`] check is performed.

```php
<?php
$some_value = 42;

$return_value = match($some_value) {
    0 => 'number is 0',
    1 => 'number is 1',
    default => 'number is something else'
}
```

To do an equality [`==`] check, you can rearrange the condition:

```php
<?php
$some_value = 42;

$return_value = match(true) {
    $some_value < 100 => 'number is less than 100',
    $some_value > 100 => 'number is greater than 100',
    $some_value == 100 => 'number is 100',
}
```

In a match expression, if no condition is matched, an `UnhandledMatchError` will be thrown.

A match expression evaluates a value and a condition to return an expression to be evaluated.
Much like a ternary, if the condition does not match, the return expression is not evaluated.
To match a condition, an identity [strict equality or `===`] check is performed.

```php
<?php
$some_value = 42;

$return_value = match($some_value) {
    0 => 'number is 0',
    1 => 'number is 1',
    default => 'number is something else'
}
```

To do an equality [`==`] check, you can rearrange the condition:

```php
<?php
$some_value = 42;

$return_value = match(true) {
    $some_value < 100 => 'number is less than 100',
    $some_value > 100 => 'number is greater than 100',
    $some_value == 100 => 'number is 100',
}
```

In a match expression, if no condition is matched, an `UnhandledMatchError` will be thrown.
