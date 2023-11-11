# Type Juggling

Type juggling may also be known as type coercion.
Type juggling is when two values of different types are coerced to the same type to perform an operation.

```php
$baskets = 5 // int
$apples_per_basket = "3" // string
$baskets * $apples_per_basket
# => 15
```

This can be done implicitly (see above example), or explicitly with `C`-style type casting:

```php
$apples_per_basket = "3" // string
$my_number = (int) $apples_per_basket // cast string to int
# => 3 // int
```

Allowed types for manual type casting are: `bool`, `int`, `float`, `string`, `array`, `object`.
Most commonly, type casting is used to change an integer (`int`) to a float (`float`) or vice-versa.
