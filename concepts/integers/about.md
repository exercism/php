# Integers

Integers are whole numbers that belong to the set `{..., -2, -1, 0, 1, 2, ...}`.
The maximum and minimum values of an integer is determined by the system PHP runs in.
Typically for most modern systems, the integer is a 64-bit value -- meaning it can represent `-9_223_372_036_854_775_808` to `9_223_372_036_854_775_807` inclusive.

```php
<?php

$a = 1234;
$a = 1_234_567;
```

You can write integer literal values in other than base 10 using a base prefix:

```php
<?php

$a = 0123; // octal number (equivalent to 83 decimal)
$a = 0o123; // octal number (as of PHP 8.1.0)
$a = 0x1A; // hexadecimal number (equivalent to 26 decimal)
$a = 0b11111111; // binary number (equivalent to 255 decimal)
```

> Taken from PHP's [documentation][syntax]

[syntax]: https://www.php.net/manual/en/language.types.integer.php#language.types.integer.syntax
