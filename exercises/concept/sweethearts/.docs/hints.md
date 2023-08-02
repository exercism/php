# Hints

## General

- Read about strings in the official [string type documentation][string-type-documentation].
- Browse the [available _string functions_][string-functions] to discover the built-in operations on strings.

## 1. Get the name's first letter

- There is a [built-in function][string-substr] to get the first character from a string.
- There are multiple [built-in functions][string-trim] to remove leading, trailing, or leading and trailing whitespaces from a string.

## 2. Format the first letter as an initial

- There is a [built-in function][string-upcase] to convert all characters in a string to their uppercase variant.
- There is an [operator][concat-operator] that concatenates two strings.

## 3. Split the full name into the first name and the last name

- There is a [built-in function][string-explode] that splits a string by another string.
- A few first elements of a list can be assigned to variables by pattern matching on the list.

## 4. Put the initials inside of the heart

- There is a special syntax for [expading variables][string-variables] inside of a string.
- There is a special syntax for writing [multiline strings][heredoc-syntax] without needing to escape newlines.

[string-type-documentation]: https://www.php.net/manual/en/language.types.string.php
[string-functions]: https://www.php.net/manual/en/ref.strings.php 
[string-substr]: https://www.php.net/manual/en/function.substr.php 
[string-trim]: https://www.php.net/manual/en/function.trim.php 
[string-upcase]: https://www.php.net/manual/en/function.strtoupper.php
[string-explode]: https://www.php.net/manual/en/function.explode.php
[string-variables]: https://www.php.net/manual/en/language.types.string.php#language.types.string.parsing 
[concat-operator]: https://www.php.net/manual/en/language.operators.string.php
[heredoc-syntax]: https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
