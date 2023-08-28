# About

Available as of `PHP 8.0.0`, **Union Type Declarations** accept values of multiple different types, rather than a single type. Union type definitions are made using the pipe (`|`) to separate types.

```php
function add(int|float $a, int|float $b): int|float
{
    return $a + $b;
}
```

## Nuances

- `null` cannot be used as a standalone type, but types may be declared _nullable_ by either using `?Type` or `Type1|Type2|null`. As of [PHP 8.2](https://www.php.net/manual/en/language.types.declarations.php), null can be used as a standalone type.
- `false` cannot be used as a standalone type, and is included for historical reasons, as many legacy functions may return `false` when an error is encountered. As of [PHP 8.2](https://www.php.net/manual/en/language.types.declarations.php) false can be used as a standalone type.
- declared duplicate or redundant types will result in a compile-time error.
- `void` cannot be used as part of a union type declaration.
