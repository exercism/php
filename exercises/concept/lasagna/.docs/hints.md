# Hints

## General

- [Printing values][exercism-debugging] is not part of the solution, but you can use [`var_dump();`][php-vardump] to understand what PHP sees.
- An [integer value][php-integers] can be defined as one or more consecutive digits.
- [String][php-string] literals are a sequence of characters surrounded by double quotes.

## 1. Define the expected oven time in minutes

- You need to [explicitly return][php-return] a value from a function.
- You need to return an [integer][php-integers].

## 2. Calculate the remaining oven time in minutes

- You need to [explicitly return][php-return] a value from a function.
- The function's argument is an [integer][php-integers].
- You can use the [mathematical operator for subtraction][php-operators] to subtract values.
- You can [invoke one of the other functions][exercism-methods] of the class.

## 3. Calculate the preparation time in minutes

- You need to [explicitly return][php-return] a value from a function.
- The function's argument is an [integer][php-integers].
- You can use the [mathematical operator for multiplication][php-operators] to multiply values.

## 4. Calculate the total working time in minutes

- You need to [explicitly return][php-return] a value from a function.
- The function's arguments are [integers][php-integers].
- You can [invoke one of the other functions][exercism-methods] of the class.
- You can use the [mathematical operator for addition][php-operators] to add values.

## 5. Create a notification that the lasagna is ready

- You need to [explicitly return][php-return] a value from a function.
- You need to return a [string][php-string].

[exercism-debugging]: /tracks/php/concepts/basic-syntax#h-simple-debugging
[exercism-methods]: /tracks/php/concepts/basic-syntax#h-functions-and-methods
[php-integers]: https://www.php.net/manual/en/language.types.integer.php
[php-operators]: https://www.php.net/manual/en/language.operators.arithmetic.php
[php-return]: https://www.php.net/manual/en/functions.returning-values.php
[php-string]: https://www.php.net/language.types.string
[php-vardump]: https://www.php.net/manual/en/function.var-dump
