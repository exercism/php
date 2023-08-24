# Floating Point Numbers

Floating point numbers are used in PHP to represent a subset of real numbers.
They start with one or more digits separated by a decimal separator.

```php
<?php

$a = 1.234; 
$b = 1.2e3; 
$c = 7E-10;
$d = 1_234.567; // as of PHP 7.4.0
```

## Common pitfalls

Not all numbers and arithmetic operations can be performed with floating point numbers.
Using floating point numbers to represent dollars and cents can lead to rounding errors.

```php
<?php

$result = 0.1 + 0.2; // => 0.30000000000000004
```
