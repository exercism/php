# Instructions

In this exercise, you will be simulating a windowing based computer system.
You will create some windows that can be moved and resized.
The following image is representative of the values you will be working with below.

```
 ╔════════════════════════════════════════════════════════════╗
 ║                                                            ║
 ║        position::$x,_                                      ║
 ║        position::$y  \                                     ║
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

Using the provided class scaffold, provide the properties for the `x`, `y`, `height`, and `width` values.

```php
<?php

$window = new ProgramWindow();
$window->x; // => null
$window->y; // => null
$window->width; // => null
$window->height; // => null
```

## 2. Define the initial values for the program window

Define a constructor function for `ProgramWindow`.
It should not take any arguments, but during the constructor execution set the default values for its properties.
It should set the initial `x` and `y` values to `0`.
It should set the initial `width` and `height` to an `800x600` screen size.

```php
<?php

$window = new ProgramWindow();
$window->x; // => 0 
$window->y; // => 0
$window->width; // => 800
$window->height; // => 600
```

## 3. Define a function to resize the window

Define a new class in `Size.php` for a Size class.
It should take constructor arguments to set an `height` and `width` property.
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
It should take constructor arguments to set a `y` and `x` property.
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
