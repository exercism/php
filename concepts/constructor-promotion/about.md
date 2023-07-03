# Constructor Property Promotion

In classes that declare many properties, separately declaring a class, its properties, and a constructor to set the properties requires repetition.
Using constructor property promotion we can reduce the amount of repetition.

```php
<?php

class Book
{
    private string $isbn;
    private string $doi;
    private string $title;

    public function __construct(string $isbn, string, $doi, string $title)
    {
        $this->isbn = $isbn;
        $this->doi = $doi;
        $this->title = $title;
    }
}

// Using constructor property promotion
class Book
{
    public function __construct(
        private string $isbn,
        private string $doi,
        private string $title
    ) {
    }
}
