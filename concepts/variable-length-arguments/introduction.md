# About

Function arguments can be specified such that it can take any number of arguments:

```php
<?php

function actOnItems(...$items) {
  // $items is an array containing 0 or more values
  // used to call the function.
}

actOnItems(1, 2, 3, 4); // $items => [1, 2, 3, 4]
```
