# Visibility

When using classes to organize code, the visibility of properties, methods, and constants can encourage proper abstractions and responsibilities.
The visibility of properties, methods, and constants is defined by the usage of the `public`, `private`, or `protected` keywords at the time they are declared.
Visibility is always in reference to an external usage of the class property, method, or constant.
That is, if a property is declared `public`, it is observable and usable to external calls.
Private properties, methods, and constants are not observable or usable to external calls.

```php
<?php

class SecretDocument
{
    private $encryption_key;

    public $title;

    public function __construct($encryption_key, $title)
    {
        $this->encryption_key = $encryption_key;
        $this->title = $title;
    }
}

$document = new SecretDocument('secret_password', 'Secret Plans');
$title = $document->title; // => succeeds
$key = $document->encryption_key; // => fails
```

Protected properties, methods, and constants are only observable to themselves and any children (by inheritance) classes.

```php
<?php

class Shape
{
    protected $color = "blue";
}

class Square extends Shape
{
    public function getColor()
    {
        return $this->color;
    }
}

$square = new Square();
$color = $square->getColor(); // => succeeds
```

