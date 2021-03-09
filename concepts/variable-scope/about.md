# About

By default, variables are limited to the scope they are defined in. If defined in a file outside of a function or class, they are limited to the scope of the file. If defined in a function or class, they are limited to the scope of the function or class.

```php
<?php

$file_scoped = "I am file scoped";

function example(): void
{
  $function_scoped = "I am function scoped!";
}
```

## Global Scope

Using the keyword `global` before a variable assignment creates a globally scoped variable. This pattern is often discouraged as it creates [tightly-coupled code](<https://en.wikipedia.org/wiki/Coupling_(computer_programming)#Disadvantages_of_tight_coupling>).

```php
function example(): void
{
  global $hello = "World!";
}

echo $hello; // #=> "World!"
```

## Static Scope

Using the keyword `static` before a variable assignment or declaration will preserve the variables scope, but its value is preserved between execution scopes.

```php
function counter(): int
{
  static $count = 0;
  $count += 1;
  return $count;
}
```

In this example, the `$count` variable is initialized to 0 _only on the first function call_. Every call after, the value will be carried over to the next call. So every invocation of the function returns an increasing integer response.
