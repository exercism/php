## Callable

In PHP there is a concept of [callable](https://www.php.net/manual/en/language.types.callable.php).

Those can take multiple forms, but we will focus on [anonymous functions](https://www.php.net/manual/en/functions.anonymous.php).

It is possible to create an anonymous function in a variable and call it with parameters:

```php
$double = function ($number) {
    return $number * 2;
};

$double(2); // returns 4
$double(4); // returns 8
```
