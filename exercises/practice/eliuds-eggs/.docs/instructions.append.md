## Bitwise operators

In PHP there are [bitwise operators](https://www.php.net/manual/en/language.operators.bitwise.php).

For example, the "bitwise and" operator (`&`) can be used to check that a bit of a number is defined:
```php
$number = 89; // 0b01011001
$mask16 = 16; // 0b00010000
$mask32 = 32; // 0b00100000

$isMask16 = ($number & $mask16) > 0; // 0b00010000 > 0 => TRUE
$isMask32 = ($number & $mask32) > 0; // 0b00000000 > 0 => FALSE
```