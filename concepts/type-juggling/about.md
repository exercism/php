# Type Juggling

The type of a variable is determined by its context in PHP. If a string value is assigned to a variable, it is a string type, and if it is reassigned to an integer, it is then an int.

```php
$var = "I am a string"
$var = 5 // Now I am an integer
```

Type juggling in PHP is also known as type coercion in other programming languages, like JavaScript. This is when two types are coerced to the same type to perform an operation.

```php
$baskets = 5
$apples_per_basket = "3"
$total_apples = $baskets * $apples_per_basket
```

This is sometimes confusing in larger code samples, so relying on type coercion is typically not recommended.

## Type Casting

Rather than relying on implicit coercion, we can explicitly force a value to be evaluated as a certain type using `C`-style type casting

```php
$
```
