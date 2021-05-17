# Introduction

In PHP, a variable can be called as a function by applying parentheses [`()`] to it. When PHP attempts to invoke the function, it will search for a function with the same name as the value of the variable.

```php
function foo(): string
{
    return "foo() invoked";
}

$func = 'foo';
$func(); // This calls foo()
```
