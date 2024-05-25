# Introduction

## Arrays

Arrays in PHP are ordered maps.
A map is a data structure that associates a key to a value.
Arrays are versatile and can be treated as a linear array (like in `C` or `Java`), list [vector], hash-table, dictionary, collection, stack, or a queue.

A key is optional, but if specified must either be an `int` or a `string`.
When a key is not provided, PHP defaults to integer keys in increasing order, starting at `0`.

```php
$no_keys = ["my", "first", "array"];
$integer_keys = [0 => "my", 1 => "first", 2 => "array"];

$no_keys == $integer_keys // => equal returns true
$no_keys === $integer_keys // => strictly equal returns true
```

An array can store values of all types.
Each value can have a different type.

### Using Arrays

Arrays can be declared as a literal (written in code, as done above) or created and manipulated as functions.
Access, assign, append values using the index operator:

```php
$prime_numbers = [2, 3, 5, 6];

$prime_numbers[3] = 7; // replace 6 with 7

$prime_numbers[] = 11; // array now contains [2, 3, 5, 7, 11]
```

## Variable-Length Arguments

Function arguments can be specified such that it can take any number of arguments:

```php
<?php

function actOnItems(...$items) {
  // $items is an array containing 0 or more values
  // used to call the function.
}

actOnItems(1, 2, 3, 4); // $items => [1, 2, 3, 4]
```
