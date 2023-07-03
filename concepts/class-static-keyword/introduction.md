# Class Static Keywords

A class is a unit of code organization in PHP, often representing an instance of a thing/service/procedure.
Using the `static` and `self` keywords, properties and methods may exist in reference to the class for all instances (or no instance).

```php
<?php

class Book
{
    static $genre = 'Adventure';

    static function getGenre()
    {
        return self::$genre;
    }
}

// Usage
$genre = Book::$genre;
$genre = Book::getGenre();
```

## Limitation

Static class methods can only call other static class properties or class methods from its own class.
