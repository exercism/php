# Basics

## Values and Variables

PHP is a general-purpose dynamically-typed programming language.
Value types are only checked while the program is running.
Using the assignment `=` operator, any value type may be assigned to any variable name.
Variable names must start with a dollar `$` sign.

```php
<?php
$count = 1 // Assigned an integer value of 1
$count = 2 // Re-assigned a new value to the variable

$count = false // You may assign any value type

// Strings can be created by enclosing the characters
// within single `'` quotes or double `"` quotes.
$message = "Success!"
```

## Code organization

PHP code files are text files that start with `<?php`.
If the file contains only php code, there is no closing `?>` tag.
Code, functions, and classes may all be present in a single file, but usually classes are in their own file with a filename which matches the class.

```php
<?php
// index.php

$sum = add(1, 2);
```

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

## Naming conventions

Classnames should all be `PascalCase`.
Depending on the style standard; variables, functions, method names may be either `camelCase` or `snake_case`.
Names may contain letters `a-zA-Z`, numbers `0-9`, and underscores `_` but they cannot start with a number.

## Comments

Single line comments start with `//`, and a block of text can be wrapped with `/*` and  `*/` to become a comment.

```php
<?php

// Single line comment

/*
  Multi-line comment
*/
```

