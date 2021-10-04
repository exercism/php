# Introduction

PHP allows for the declaration of functions within other functions. These functions do not need to be named, but can be assigned to variables or even directly passed into another function that requires a function parameter.

```php
function onlyOdds(array $numbers): array
{
    return array_filter($numbers, function($num) {
        return $num % 2 === 1;
    });
}
```
