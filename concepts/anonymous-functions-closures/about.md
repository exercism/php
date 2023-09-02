# About Anonymous Functions and Closures

PHP allows for the declaration of functions within other functions. These functions do not need to be named, but can be assigned to variables or even directly passed into another function that requires a function parameter.

```php
function onlyOdds(array $numbers): array
{
    return array_filter($numbers, function($num) {
        return $num % 2 === 1;
    });
}
```

The function defined and passed into array_filter above is an anonymous function. The `array_filter` function uses this to determine whether a given value in an array will be returned in the result from the `array_filter`. If the function returns `true` for a value, then it will be included in the result array.

Anonymous functions can also be used to reference variables that are in scope outside the function from inside the function. This is known as the function's scope "closing" over the variable that is used in the function, hence the name "closure". In some languages, all in scope variables are automatically allowed to be used within the closure. For PHP, `$this`, referring to the current object is automatically allowed within the closure. All other variables must be explicitly referenced using the `use` keyword.

```php
function makeAdderFunction(int $number) {
    return function(int $x) use($number) {
        return $x + $number;
    }
}

$add5 = makeAdderFunction(5);
echo $add5(4); // echos 9
```

In the function `makeAdderFunction` above, the `$number` value that is passed in is "closed" over withing the internally defined anonymous function which is then returned. Then whenever that function is executed it knows the value of the `$number` that was passed in. If you were to call this function again with another number, that would return a completely different function. It would not change the values or the functionality returned by the first function call.

If you need to close over more than one variable, they can be added into the `use` keyword separated by a comma.

PHP also has a shorter function syntax called `arrow functions`. They are required to be fairly simple. The basic form of these is:

```php
fn(arguments) => expression
```

In this function style, you do not need to use `use`. It will automatically close over and capture any values in the parent scope. The expression in these arrow functions is automatically returned without needing to use the `return` keyword. That would allow us to rewrite the `onlyOdds` function above like so:

```php
function onlyOdds(array $numbers): array
{
    return array_filter($numbers, fn($n) => $n % 2 == 1);
}
```

The `makeAdderFunction` above could be rewritten like this:

```php
function makeAdderFunction(int $number) {
    return fn(int $x) => $x + $number;
}
```

**Note:** If the function cannot be written as an expression, then the shorter arrow function syntax cannot be used.

Variables are passed to and used within anonymous function and closures by value. This means that if you change the value of the variable within the function, it will not affect the value of the variable outside the function. If you need the value to be modified, you can pass it by reference.

```php
function positiveAverage(array $numbers): float
{
    $total = 0;
    $count = 0;
    return array_walk(
      $numbers, 
      function($num) use (&$count, &$total) {
          $total += abs($num);
          $count++;
      }
    );
    return $total / $count;
}
```

In the example above `array_walk` iterates over each element in array, sending each value to the function declared in the call. It keeps a running total in `$total` where each value added is the absolute value of the number. It also keeps track of how many numbers there were. Both values are used in the closure by reference, indicated by the `&` in front of each variable within the `use` section. This means that the changes happening to the variables will still be in place when `array_walk` is complete so the function can return the average of the absolute values of the numbers in the array.

Anonymous functions and closures can provide a convenient way to define a function that may only be needed within a single context, or to define a function that returns a dynamic function based on a set of parameters that are known at a different time than when the function is actually used.
