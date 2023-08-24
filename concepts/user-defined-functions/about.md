# About

**User-defined** functions are created using the `function` keyword. It must then be followed by a function name and a list of arguments.

```php
function alarm($hour, $minute, $second)
{
    return 'Alarm!';
}
```

Functions can be called in a file before they are defined, as they are hoisted to the top of their scope.

## Naming

Function names in PHP follows the rules of other labels: It must begin with an underscore or letter, then may be followed by any number of letters, numbers, or underscores.
