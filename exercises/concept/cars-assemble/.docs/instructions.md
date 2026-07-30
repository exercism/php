# Instructions

In this exercise you'll write code to analyze the production of an assembly line in a car factory.
The assembly line's speed can range from `0` (off) to `10` (maximum).

At its lowest speed (`1`), `221` cars are produced each hour.
The production increases linearly with the speed.
So with the speed set to `4`, the line should produce `4 * 221 = 884` cars per hour.
However, higher speeds increase the likelihood that faulty cars are produced, which then have to be discarded.

You have four tasks.

## 1. Calculate the success rate

Implement the `successRate()` method to calculate the ratio of cars created without error for a given speed.
Use comparisons to choose the correct rate from this table:

- `0`: 0% success rate (`0.0`)
- `1` to `4`: 100% success rate (`1.0`)
- `5` to `8`: 90% success rate (`0.9`)
- `9`: 80% success rate (`0.8`)
- `10`: 77% success rate (`0.77`)

```php
<?php

$assemblyLine = new CarsAssemble();
$assemblyLine->successRate(10);
// => 0.77
```

## 2. Calculate the production rate per hour

Implement the `productionRatePerHour()` method to calculate how many cars are successfully produced per hour.
Multiply the base production (`221` cars per hour at speed `1`) by the speed and by the success rate for that speed.

```php
<?php

$assembly_line = new CarsAssemble();
$assembly_line->productionRatePerHour(6);
// => 1193.4
```

## 3. Check whether the line is running

Implement the `isLineRunning()` method to return whether the assembly line is running.
The line is running when its speed is **not identical** to the `off` speed (`0`).

```php
<?php

$assembly_line = new CarsAssemble();
$assembly_line->isLineRunning(0);
// => false

$assembly_line->isLineRunning(3);
// => true
```

## 4. Compare two line speeds

Implement the `compareSpeeds()` method to compare two speeds.
It should return:

- `-1` when the first speed is less than the second
- `0` when both speeds are equal
- `1` when the first speed is greater than the second

```php
<?php

$assembly_line = new CarsAssemble();
$assembly_line->compareSpeeds(3, 7);
// => -1

$assembly_line->compareSpeeds(5, 5);
// => 0

$assembly_line->compareSpeeds(9, 2);
// => 1
```
