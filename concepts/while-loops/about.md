# About

PHP has a number of built-in looping control structures, such as `while`. The basic form of a `while` statement is:

```php
while (expr) {
  // statements
}
```

While the expression (_expr_) evaluates to a _truthy_ value, it will iterate over the statements inside the loop. If the expression (_expr_) evaluates to false before the first iteration, the statements are never run.

Alternatively you can use a `do-while` loop, which runs the statements in the loop once before evaluating the expression (_expr_).

```php
do {
  // statements
} while (expr);
```
