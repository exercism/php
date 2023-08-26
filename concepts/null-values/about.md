# Null

Null is a primitive value type with only one value: `null`.
Null is often used to represent nothingness.
It is considered "falsey", but is distinct from `false` and other falsey values.

```php
<?php

is_null(null); // => true
isset(null); // => false

null == true; // => false
null === true; // => false

null == false; // => true
null === false; // => false
```

## Working with null values

In PHP, null values can be a common cause of error as they are often returned in place of an error state or to represent nothing.
Preventing errors from arising often requires "null-checking" to assert the value is not null before operating on it.

```php
<?php

$value = null;

$value->doSomething(); // throws an error as a null value is not an object instance.

if (!is_null($value)) {
    $value->doSomething(); // succeeds
}
```

Repeatedly null-checking can be error prone, so PHP provides two operators for working with null values -- the null-safe access `?->` operator and the null coalescing `??` operator.

```php
<?php

$value = null;
$result = $value?->doSomething(); // => return null rather than error
$result = $result ?? "default"; // => "default" is assigned to $result
```
