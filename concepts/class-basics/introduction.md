# Classes

Classes are a unit of code organization in PHP.
Code represents the behavior of an item or the behavior of a process can be grouped together as a class.
Functions that are assigned to a class are called `methods` by convention.

```php
<?php

class Door
{
    function lock()
    {
        // ...
    }

    function unlock()
    {
        // ...
    }
}
```

Classes are instantiated with the `new` keyword, this allocates memory for the class instance and calls the classes constructor method.
Instantiated classes may be assigned to a variable.
To invoke the methods of a class instance, we can use the `->` access operator 

```php
<?php

$a_door = new Door();
$a_door->lock();
$a_door->unlock();
```

An instantiated class may reference its own instance using the special `$this` variable.
Classes may also have properties, these act as variables that are tied to the instance of the class object.
These properties may be referenced internally or externally.

```php
<?php

class Car
{
    public $color

    function __construct($color)
    {
        $this->color = $color;
    }

    function getColor(): string
    {
        return $this->color;
    }
}

$a_car = new Car("red");
$a_car->color; // => "red" by accessing the property
$a_car->getColor(); // => "red" by invoking the instance method
```


