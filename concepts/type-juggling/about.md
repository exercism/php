# Type Juggling

Type juggling may also be known as type coercion.
Type juggling is when two values of different types are coerced to the same type to perform an operation.

```php
$baskets = 5 // int
$apples_per_basket = "3" // string
$baskets * $apples_per_basket
# => 15 // int
```

When the expression is evaluated, the string value is implicitly converted to an `int` to match the expectation of the `*` operator.
The decision, which type to coerce, is made by PHP according to the rules of the operation and these rules vary largely.

Type coercion also happens when calling functions and methods:

```php
strlen(12321);
# => 5
```

## Type Casting

Rather than relying on implicit coercion, we can explicitly force a value to be evaluated as a certain type using `C`-style type casting:

```php
$apples_per_basket = "3" // string
$my_number = (int) $apples_per_basket // cast string to int
# => 3 // int
```

This will convert the value to the type specified in the brackets `(...)`.
All primitive types can be used as the target type: `bool`, `int`, `float`, `string`, `array`, `object`.

## Temporary conversion only

Type juggling or casting **does not change** the type of the value stored in a variable.
Only the input to the operation is converted.

```php
$apples_per_basket = "3" // string
5 * $apples_per_basket
# $apples_per_basket => "3" // string

$my_number = (int) $apples_per_basket // cast string to int
# $apples_per_basket => "3" // string
```

## Loss of information

When a value is coerced to another type, there may be a loss of information in the process:

```php
$exact_distance = 15.5
$rough_distance = (int) $exact_distance
// => 15

$is_distant = (bool) $exact_distance
// => true

$erroneous_distance = (float) $is_distant
// => 1.0
```

Relying on casting, either explicitly or implicitly, may produce errors in a larger system.

## Explicit type casting to `array` and `object`

Values can be cast to `array` and `object` types as well.
If a value, which is not an array or an object is cast to an `array`, it is converted to a single item present in an array:

```php
$day_of_the_week = 'Monday';
(array) $day_of_the_week
// => array(1) {
//      [0]=>
//        string(6) "Monday"
//    }
```

When cast to an `object`, the value is set to a public property named `scalar`:

```php
$car = "Honda"
(object) $car
// => object(stdClass)#1 (1) {
//      ["scalar"]=>
//        string(5) "Honda"
//    }
```

> `stdClass` is the type of an anonymous class built-in to PHP.
