# Readonly Classes and Properties

Readonly classes and properties allow classes to specify public properties for easy access but prevent modification.
To declare a property as readonly, it must have `readonly` added before the type specification.
The property is allowed to be assigned once, but any attempt to re-assign or modify the value will result in an Error.

```php
<?php

class Block
{
    public function __construct(
        public readonly int $length,
        public readonly int $width,
    ) {
    }
}
```

Readonly classes build on this behaviour which, if declared as `readonly`, apply the read only declaration to each property.
Additionally it prevents the addition of dynamic properties.

```php
<?php

readonly class Block
{
    public function __construct(
        public int $length,
        public int $width,
    ) {
    }
}
```
