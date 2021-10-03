# About

In PHP, a variable can be called as a function by applying parentheses [`()`] to it. When PHP attempts to invoke the function, it will search for a function with the same name as the value of the variable.

```php
function foo(): string
{
    return "foo() invoked";
}

$func = 'foo';
$func(); // This calls foo()
```

## Calling static class functions

Static class functions can be called in the same way:

```php
class Rocket
{
    public static function launch()
    {
        return '3, 2, 1, Liftoff!';
    }
}

$func = 'Rocket::launch';
$func(); // This calls Rocket::launch()
```

## Calling instance class functions

Calling the function of a class instance is also possible:

```php
class Rocket
{
    public function openDoor()
    {
        return 'Door open.';
    }
}

$rocket = new Rocket();
$func = [$rocket, 'openDoor'];
$func(); // This calls Rocket::openDoor()
```
