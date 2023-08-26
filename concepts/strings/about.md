# Strings

Strings are a series of characters, surrounded by quotes.
Both single and double quotes are supported.

```php
<?php

$where = "Spain";
$what = 'rain';
```

## String variable expansion

In double quoted strings, if a variable is referenced while it is in scope, the value is inserted into the string.

```php
<?php

$answer = 42;
$expanded = "The answer to life, the universe, and everything is $answer"; 
```

## Character Encoding Support

Historically, string functions in PHP only supported ASCII characters and did not support modern Unicode encodings.
ASCII characters are each 1 byte, whereas Unicode characters may be 1-4 bytes in length.
If needing to manipulate Unicode strings safely, refer to the [multibyte versions][multi-byte-fns] of the historic functions.

```php
<?php

$byte_length = strlen('😃'); // => 4
$string_length = mb_strlen('😃'); // => 1
```

[multi-byte-fns]: https://www.php.net/manual/en/ref.mbstring.php
