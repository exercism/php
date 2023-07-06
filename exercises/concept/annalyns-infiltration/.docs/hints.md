# Hints

## 1. Check if the 'Fast Attack' action is possible

- The logical NOT operator (`!`) can be placed before an expression to negate its value.
- Check out [this document][logical-operators] on Logical Operators

## 2. Check if the 'Spy' action is possible

- Logical expressions are evaluated from left to right and are tested for possible 'short-circuits'.
- For a comprehensive understanding of the left-to-right mechanic, take a look at [this article][operator-precedence].

## 3. Check if the 'Signal Prisoner' action is possible

- Logical operators in the order of their precedence (from highest to lowest): `!`, `&&`, `||`.
- Check out [this article][operator-precedence] on Operator Precedence

## 4. Check if the 'Free Prisoner' action is possible

- `()` is the operator with the highest precedence. Use it to group logical expressions.

[logical-operators]: https://www.php.net/manual/en/language.operators.logical.php
[operator-precedence]: https://www.php.net/manual/en/language.operators.precedence.php
