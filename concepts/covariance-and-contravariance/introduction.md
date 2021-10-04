# Introduction

The concepts of covariance and contravariance in PHP are important as PHP enforces these rules are followed when extending classes or interfaces.

Covariance preserves the relationship between two types, while contravariance reverses that relationship. In short it means that when extending classes and overriding functions, you may allow more or less specific types for your method's parameters, and you may return fewer or more specific types from the method.

## Examples

Consider the following class:

```php
class Calculator 
{
    public function add(int $x, int $y): int 
    {
        return $x + $y;
    }
}
```

If we extend the class, we can allow more parameter types than originally declared, but we cannot return anything other than the original return types.

```php
class Floatulator extends Calculator
{
    // This is valid
    public function add(int|float $x, int|float $y): int 
    {
        return (int)($x + $y);
    }
}
```

The following extended class is not valid because returning additional or wider types are not allowed:

```php
class BrokenCalculator extends Calculator 
{
    // This is invalid and will not compile
    public function add(int|float $x, int|float $y): int|float{
        return $x + $y;
    }
}
```
