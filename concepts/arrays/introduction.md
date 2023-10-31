# Arrays

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

A values are of `mixed` type, and each value in an array is not required to be of the same type.

## Using Arrays

Arrays can be declared as a literal (written in code, as done above) or created and manipulated as functions.
Access, assign, append values using the index operator:

```php
$prime_numbers = [1, 3, 5, 7, 11, 12];

$prime_numbers[5] = 13; // replace 12 with 13

$prime_numbers[] = 17; // array now contains [1, 3, 5, 7, 11, 13, 17]
```

