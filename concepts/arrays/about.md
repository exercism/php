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

An array can store values of all types.
Each value can have a different type.

```php
$my_arr = [
  1,
  "second",
  new \DateTimeImmutable()
];
```

## Using Arrays

Arrays can be declared as a literal (written in code, as done above) or created and manipulated by functions.

```php
$my_empty_arr = [];

// or
$my_empty_arr = array(); // => []

// or
$letters = mb_str_split("Hello"); // => ["H", "e", "l", "l", "o"] 
```

Access, assign, append values using the index operator:

```php
$prime_numbers = [2, 3, 5, 6];

$prime_numbers[3] = 7; // replace 6 with 7

$prime_numbers[] = 11; // array now contains [2, 3, 5, 7, 11]
```

Iterate over an array using foreach:

```php
$names = ["Ani", "Jack", "Rami"]

// Iterate just the values
foreach ($names as $name) {
  echo $name;
}

// Iterate keys and values
foreach ($names as $index => $name) {
  echo "$index => $name";
}
```
