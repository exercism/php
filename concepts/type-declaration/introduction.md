# Type Declaration

Type declarations in PHP provide type assertions at run time for function arguments, return values and class properties.
On functions, a `void` return type can be added to indicate that no value is returned from the function.
Declared types also serve as run time assertions that functions are returning a reasonably typed response.

```php
<?php

class Driver
{
    private int $serial_number;

    public function setSerialNumber(int $number): void
    {
        $this->serial_number = $number;
    }

    public function getSerialNumber(): int
    {
        return $this->serial_number; 
    }
}

$driver = new Driver();
$driver->setSerialNumber("Version 1b"); // This will throw a TypeError
```

## Type Unions

If a function argument, return value or class property can be more than one type a type union may be declared.

```php
<?php

class IdentityCard
{
    private int|null $id = null;

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
