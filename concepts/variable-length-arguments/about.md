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

If specifying a variable-length argument in addition to others, it must be the last argument.

```php
<?php

function writeLines($file_handle, ...$lines)
{
    put_file_contents($file_handle, implode("\n", $lines));
}

writeLines('file.txt', "a", "b", "c");
```
