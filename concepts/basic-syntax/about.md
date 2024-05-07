# Basics

## General syntax

PHP is an interpreted language, meaning it executes the code you write directly.
PHP code files are text files that contain a PHP opening tag `<?php` to mark the start of PHP code.
If the file contains only PHP code, it is possible to omit the closing tag `?>` which is used to mark the end of PHP code.
See [PHP tag docs][php-tag] to learn more about the PHP tag.

```php
<?php

// All PHP code goes here

// No closing tag required at the end
```

For easier reading, all code examples omit the PHP opening tag `<?php`.
But we have it in all PHP exercises, so you don't have to add it yourself.

All statements, like assignments or function calls, must end with a `;` for instruction separation.
Omitting `;` (like in JavaScript) is not allowed and results in syntax errors.
Learn more about [instruction separation][php-semicolon] from the PHP documentation.

```php
$message = "Success!"; // Statement correctly ends with `;`
$message = "I know JavaScript." // PHP Parse error: syntax error, [...]
```

## Values and Variables

PHP is a dynamically-typed programming language.
Value types are only checked while the program is running.
Using the assignment `=` operator, any value type may be assigned to any variable name.
Variable names must start with a dollar `$` sign.
To dig deeper into variables, see [PHP variable docs][php-variables].

```php
$count = 1; // Assign an integer value of 1
$count = 2; // Re-assign a new value to the variable

$count = false; // You may assign any value type

// Strings can be created by enclosing the characters
// within single `'` quotes or double `"` quotes.
$message = "Success!";
```

## Functions and Methods

Literal values and values stored in variables can be passed to functions.
New variables are created when defining function arguments to hold values passed in.

```php
// Declare the window_width function
function window_width($width)
{
    echo $width; // Access the value passed into the function as $width
    // ...
}

window_width(100); // Call the function with the literal value 100

$newWidth = 100;
window_width($newWidth); // Call the function with the value stored in $newWidth
```

Functions may return values using the keyword `return`.
Values to return can be literals, stored in variables, or the result of an instruction.

```php
function window_height()
{
    $heightOffset = 10;

    return 100 + $heightOffset;
}
```

Functions inside classes and their instances are called methods.
To call a method, the name is preceeded by the instance and `->`.
A class instance is created by the `new` operation.
Methods have access to the special variable `$this`, which refers to the current instance.

```php
<?php
// Calculator.php

class Calculator {
    // ...

    public function sub($x, $y)
    {
        return $this->add($x, -$y); // Calls the method add() of the current instance
    }

    public function add($x, $y)
    {
        return $x + $y;
    }
}

$calculator = new Calculator(); // Creates a new instance of Calculator class
$calculator->sub(3, 1); // Calls the method sub() of the instance stored in $calculator
// => 2
```

We will dig deeper into functions and classes in later exercises.

## Simple debugging

As a basic form of debugging, printing values and contents of variables helps with understanding what happens.
PHP can print values using:

- `echo $variable;` to output a string representation of the value
- `print $variable;`, which is the same as `echo $variable;`
- `var_dump($variable);` to get more insight into the value, e.g. the type PHP sees

When using `echo` or `print`: Empty strings, `false` and `null` will not show up.
And classes and instances will make them error out.
Use `var_dump()` to see these.

In the online editor, the output you produce is shown with the test results.
When you are using the CLI, the output appears mixed with the progress indicator before test summary.

## Code organization

Files are basic units of code organisation in PHP and many other languages.
For showing the name of the file to look at in a code block, we use a comment.
You never have to add such comments to your files:

```php
<?php
// NameOfPhpFile.php

[...]
```

Code, functions, and classes may all be present in a single file.
But usually these kinds of code units are in separate files.

It is common practice to have one class per file with a filename which matches the class.

```php
<?php
// Calculator.php

class Calculator {
    // ...

    function add($x, $y)
    {
        return $x + $y;
    }
}
```

Functions usually are grouped together in files describing their common theme.

```php
<?php
// window_handling.php

function window_paint()
{
    // ...
}

function window_size($width, $height)
{
    // ...
}

function window_move($x, $y)
{
    // ...
}
```

And often there are files containing statements for direct execution, like an `index.php` that is commonly used as the entrypoint of a web application.

```php
<?php
// index.php

$sum = add(1, 2);
// ...
```

## Naming conventions

Class names should all be `PascalCase`.
Depending on the style standard; variables, functions, and method names may be either `camelCase` or `snake_case`.
Names may contain letters `a-zA-Z`, numbers `0-9`, and underscores `_` but they cannot start with a number.

## Comments

Single-line comments start with `//`, and a block of text can be wrapped with `/*` and  `*/` to become a multi-line comment.

```php
// Single-line comment

/*
  Multi-line comment
*/
```

[php-tag]: https://www.php.net/manual/en/language.basic-syntax.phptags.php
[php-semicolon]: https://www.php.net/manual/en/language.basic-syntax.instruction-separation.php
[php-variables]: https://www.php.net/manual/en/language.variables.basics.php
