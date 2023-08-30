# About

The `foreach` control structure provides a convenient way to iterate over _arrays_ and _objects_. `foreach` has two basic forms:

```php
foreach (iterable as $value) {
  // statements
}

foreach (iterable as $key => $value) {
  // statements
}
```

## Modification using reference

When iterating arrays, it is possible to modify the original array by preceding the `$value` with `&`:

```php
foreach (iterable as &$value) {
  // statements
}
unset($value);
```

However, `$value` persists after the `foreach` block.

```php
$list = [1, 2, 3];

foreach ($list as &$item) {
    $item **= 2;
}

var_dump($list); // [1, 4, 9]

$item = 0;
var_dump($list); // [1, 4, 0] !
```

This problem can be solved either by breaking the reference using `unset($value)` after the `foreach` block.

```php
$list = [1, 2, 3];

foreach ($list as &$item) {
    $item **= 2;
}

var_dump($list); // [1, 4, 9]

unset($item);
$item = 0;
var_dump($list); // [1, 4, 9]
```

Or by changing item value through its index, avoiding reference altogether.

```php
$list = [1, 2, 3];

foreach ($list as $index => $item) {
    $list[$index] **= 2;
}

var_dump($list); // [1, 4, 9]
```
