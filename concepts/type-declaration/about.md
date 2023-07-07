# Type Declaration

PHP is a _dynamically typed_ language, meaning that a variable may contain any type of information.
PHP does allow for _optional_ strong type declaration for class properties, function arguments and function return values.
Strong type declarations in PHP provide type assertions at run time, however, PHP will attempt to coerce scalar types to match the declaration if possible.
The coercion behaviour may be disabled using the `strict_types` declaration at the top of the file.

```php
<?php
declare(strict_types=1);
```

Additionally functions may return a `void` return type to indicate that no value is to be returned from the function.

```php
<?php
declare(strict_types=1);

class Driver
{
    string $serial_number;

    function setSerialNumber(string $number): void
    {
        $this->serial_number = $number;
    }

    function getSerialNumber(): string
    {
        return $this->serial_number; 
    }
}

$driver = new Driver(); 
$driver->setSerialNumber(1234);
// => This will throw a TypeError with strict_types=1
```

## Type Unions

If a function argument, return value or class property can be more than one type a type union may be declared.

```php
<?php

class IdentityCard
{
    private int|float $id = 0;

    public function assign(int|float $id): void
    {
        $this->id = intval($id);
    }
}

$card = new IdentityCard();
$card->assign(5.0);
```

## Mixed Types

When working with code, we may not be able to specify a type.
Starting in PHP 8.0,an escape-hatch type named `mixed` is provided.
Mixed is equivalent to a type union of `object|resource|array|string|float|int|bool|null`.
