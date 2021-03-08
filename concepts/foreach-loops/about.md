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

When iterating arrays, it is possible to modify the original array by preceding the `$value` with `&`:

```php
foreach (iterable as &$value) {
  // statements
}
unset($value);
```

However, `$value` persists after the `foreach` block so it is **strongly** recommended to break the reference using `unset($value)` after the block.
