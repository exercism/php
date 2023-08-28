# Ternary Operator

The ternary operator provides an alternate syntax to perform an `if..else..` comparison and return a value.

## Syntax

PHP provides an if statement where an action can be evaluated on the basis of the "truthiness" of a condition.

```php
if ($condition) {
  $value = 1;
} else {
  $value = 2
}
```

Alternatively, the ternary operator can represent the same operation:

```php
$value = $condition
  ? 1  // True branch
  : 2; // False branch
```

The comparison syntax is short, represented by `(condition) ? (evaluate if true) : (evaluate if false);`.

## Benefits

The obvious benefit of using a ternary operator is brevity, such that it is short to write the conditional expression compared to an `if..else..` statement, but there are several others as well:

- It is an expression which can be used inside of another expression
- It facilitates lazy evaluation of each branch.

  ```php
  function expensiveCalculation(): int
  {
    // An expensive calculation is performed
    $answerToEverything = 42;
    return $answerToEverything;
  }

  $needExactAnswer = false;
  $estimatedAnswer = 40;
  $answer = $needExactAnswer ? expensiveCalculation() : $estimatedAnswer;
  ```

  In this example, if the exact answer is not required, the expensive calculation is not invoked.

## Drawbacks

Ternary operators have several drawbacks, making it important to consider their use:

- A ternary operator can be more difficult to read as it depends on interpreting symbols rather than the use of keywords.
- A ternary operator may inadvertently lead to bugs because the ternary operator in PHP is left-associative in contrast to most contemporary languages (e.g. C, Java, JavaScript).
- The evaluated expression in the true or false branches must return a value.

## Even Shorter

The Ternary syntax can be shortened further to `(condition) ?: (evaluate if falsey)`.
One such use would be to be able to provide a fallback value in an expression:

```php
$fruit = null;
eat($fruit ?: 'apple');
```

This is also sometimes known as the _Elvis operator_ (`?:`)
