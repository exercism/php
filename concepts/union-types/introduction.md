# Introduction

Available as of `PHP 8.0.0`, **Union Type Declarations** accept values of multiple different types, rather than a single type. Union type definitions are made using the pipe (`|`) to separate types.

```php
function add(int|float $a, int|float $b): int|float
{
    return $a + $b;
}
```
