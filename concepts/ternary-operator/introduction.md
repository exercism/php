# Ternary Operator

The ternary operator provides an alternate syntax to perform an `if..else..` comparison and return a value.

## Syntax

PHP provides an if statement where an action can be evaluated on the basis of the "truthiness" of a condition.

```php
if ($condition) {
  $value = 1;
} else {
  $value = 2
}
```

Alternatively, the ternary operator can represent the same operation:

```php
$value = $condition
  ? 1  // True branch
  : 2; // False branch
```

The comparison syntax is short, represented by `(condition) ? (evaluate if true) : (evaluate if false);`.
