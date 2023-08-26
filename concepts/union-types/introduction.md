# Introduction

Available as of `PHP 8.0.0`, **Union Type Declarations** accept values of multiple different types, rather than a single type. Union type definitions are made using the pipe (`|`) to separate types.

```php
function add(int|float $a, int|float $b): int|float
{
    return $a + $b;
}
```

PHP will throw a `TypeError` in strict mode if the incoming parameters are not either a `float` or an `int`. In non-strict mode, a type error will be thrown if the incoming parameters cannot be coerced into a `float` or an `int`.

Similarly, if the function does not return one of the declared types, PHP will throw a `TypeError` at runtime.
