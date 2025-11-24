# Instructions

In this exercise, you will be simulating a windowing based computer system.
You will create some windows that can be moved and resized.
The following image is representative of the values you will be working with below.

```text
 ╔════════════════════════════════════════════════════════════╗
 ║                                                            ║
 ║        position::$y,_                                      ║
 ║        position::$x  \                                     ║
 ║                       \<---- size::$width ---->            ║
 ║                 ^      *──────────────────────┐            ║
 ║                 |      │        title         │            ║
 ║                 |      ├──────────────────────┤            ║
 ║                 |      │                      │            ║
 ║          size::$height │                      │            ║
 ║                 |      │       contents       │            ║
 ║                 |      │                      │            ║
 ║                 |      │                      │            ║
 ║                 v      └──────────────────────┘            ║
 ║                                                            ║
 ║                                                            ║
 ╚════════════════════════════════════════════════════════════╝
```

## 1. Define the properties of the Program Window

Using the provided class scaffold, provide the properties for the `y`, `x`, `height`, and `width` values.

```php
<?php

$window = new ProgramWindow();
$window->y; // => null
$window->x; // => null
$window->height; // => null
$window->width; // => null
```

## 2. Define the initial values for the program window

Define a constructor function for `ProgramWindow`.
It should not take any arguments, but during the constructor execution set the default values for its properties.
It should set the initial `y` and `x` values to `0`.
It should set the initial `height` and `width` to a `600x800` screen size.

```php
<?php

$window = new ProgramWindow();
$window->y; // => 0 
$window->x; // => 0
$window->height; // => 600
$window->width; // => 800
```

## 3. Define a function to resize the window

Define a new class in `Size.php` for a Size class.
It should take constructor arguments to set the `height` and `width` properties.
Additionally `ProgramWindow` requires a resize function, which receives the `Size` object instance and updates its own properties.

```php
<?php 

$window = new ProgramWindow();
$size = new Size(764, 1080);
$window->resize($size)

$window->height;
// => 764
$window->width;
// => 1080
```

## 4. Define a function to move the window

Define a new class in `Position.php` for a Position class.
It should take constructor arguments to set the `y` and `x` properties.
Additionally `ProgramWindow` requires a move function, which receives the `Position` object instance and updates its own properties.

```php
<?php 

$window = new ProgramWindow();
$position = new Position(80, 313);
$window->move($position)

$window->y;
// => 80
$window->x;
// => 313
```
