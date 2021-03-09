# Introduction

By default, variables are limited to the scope they are defined in. If defined in a file outside of a function or class, they are limited to the scope of the file. If defined in a function or class, they are limited to the scope of the function or class.

```php
<?php

$file_scoped = "I am file scoped";

function example(): void
{
  $function_scoped = "I am function scoped!";
}
```

Variables may also be declared specifically to be `global` or `static` scoped.
