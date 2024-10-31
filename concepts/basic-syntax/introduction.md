# Basics

For more detailed information about these topics visit the [concept page][exercism-concept].

## General syntax

The PHP opening tag `<?php` marks the start of PHP code.
All statements must end with a `;` for instruction separation.

```php
<?php

$message = "Success!"; // Statement correctly ends with `;`
$message = "I fail." // PHP Parse error: syntax error, [...]
```

For easier reading, all code examples omit the PHP opening tag `<?php`.

## Comments

Single line comments start with `//`.

```php
// Single line comment
```

## Values and Variables

Using the assignment `=` operator, a value may be assigned to a variable.
Variable names must start with a dollar `$` sign and follow the [naming conventions][exercism-concept-naming-conventions].

```php
$count = 1; // Assign value of 1

// Strings can be created by enclosing the characters
// within single `'` quotes or double `"` quotes.
$message = "Success!";
```

## Functions and Methods

Values and variables can be passed to functions.
Function arguments become new variables to hold values passed in.
Functions may return any value using the keyword `return`.

```php
function window_height($height)
{
    return $height + 10;
}

window_height(100);
// => 110
```

Functions inside classes and their instances are called methods.
To call a method, the name is preceded by the instance and `->`.
Methods have access to the special variable `$this`, which refers to the current instance.

```php
<?php

class Calculator {
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

[exercism-concept]: /tracks/php/concepts/basic-syntax
[exercism-concept-naming-conventions]: /tracks/php/concepts/basic-syntax#h-naming-conventions
