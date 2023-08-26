## Covariance and Contravariance

When utilizing union types you must be aware of the concepts of covariance and contravariance. These are explained in the [documentation](https://www.php.net/manual/en/language.oop5.variance.php) but these examples may help.

Suppose we have a Calculator class utilizing a function like the above example:

```php
class Calculator
{
    public function add(int|float $x, int|float $y): int|float
    {
        return $x + $y;
    }
}
```

If you were to extend the class, you are allowed to change the parameter types and return types, but only according to the following rules.

First, parameter types may be "wider", meaning they can accept more types than the base class. For example, this is allowed:

```php
class StringCalc extends Foo
{
    public function add(float|int|string $x, float|int|string $y): int|float
    {
        if (!is_numeric($x) || !is_numeric($y)) {
            throw new \InvalidArgumentException('$x and $y must be numeric');
        }
        return $x + $y;
    }
}
```

We could substitute `StringCalc` in place of an original `Calculator` and everything would still work. The caller would still be able to send in the `float` or `int` it originally could, and the return type would still be the expected `int` or `float`.

Similarly, you can narrow the return type, meaning make it more specific by removing types from the union. This example takes advantage of this rule:

```php
class IntCalc extends Calculator
{
    public function add(float|int $x, float|int $y) : int
    {
        return (int)($x + $y);
    }
}
```

Since the `IntCalc` still accepts `int` and `float` it can still substitute for an original `Calculator` with no problems.

To read more about what is and isn't allowed, you can refer to the [Liskov Substitution Principal (LSP)](https://en.wikipedia.org/wiki/Liskov_substitution_principle).

For an example of what would not be allowed, take a look at `InvalidCalc` below:

```php
class InvalidCalc extends Calculator
{
    public function add(int $x, int $y) : int|float|string
    {
        // Declaration must be compatible with Calculator->add(x: float|int, y: float|int)

        // Return type declaration must be compatible with Calculator->add(x: float|int, y: float|int) : float|int
    }
}
```

The `InvalidCalc` class will not compile and has two problems. By reducing what is allowed as a parameter, `InvalidCalc` could not stand in for the original `Calculator` because it no longer accepts `float`. Additionally, it now could return a `string` which is also not within the allowed return types of the original class. 
