# Switch Statement

The `switch` statement facilitates an `if..elseif..else` conditional control structure.

```php
function getMessage(string $letter): string
{
  switch ($letter) {
    case 'a':
      $message = 'First letter of the english alphabet';
      break;
    case 'z':
      $message = 'Last letter of the english alphabet';
      break;
    case 'l':
    default:
      $message = 'A letter, neither the first nor the last of the alphabet';
  }
  return $message;
}

// getMessage('a') => 'First letter of the english alphabet'
// getMessage('z') => 'Last letter of the english alphabet'
// getMessage('l') => 'A letter, neither the first nor the last of the alphabet'
// getMessage('k') => 'A letter, neither the first nor the last of the alphabet'
```

One unique feature about `switch` statements is the "fall-through" behaviour of each `case`.
Note in the example the specific placement of the `break` statements.
Without a `break` statement, the each `case` will be executed from the start of the first `case` until a `break` statement is evaluated.
The order of the `case` statements inside of a `switch` is important as only up to the first matching case will be evaluated.

> A word of warning: The "fall-through" behaviour facilitates sharing code between similar cases, though it can also be a source of unintended behaviour and bugs if the `break` statement is forgotten.

Each `case` performs a non-strict (loose) comparison:

```php
function matches($value): string
{
  switch ($value) {
    case false:
      return 'matches false';
    case true:
      return 'matches true';
  }
}

// matches([]) => 'matches false'
// matches(0) => 'matches false'
// matches(null) => 'matches false'
// matches('') => 'matches false'

// matches([1]) => 'matches true'
// matches(1) => 'matches true'
// matches('a') => 'matches true'
```

## Break-less Switch Pattern

Suppose the example function above is re-written:

```php
function getMessage(string $letter): string
{
  switch ($letter) {
    case 'a':
      return 'First letter of the english alphabet';
    case 'z':
      return 'Last letter of the english alphabet';
    case 'l':
    default:
      return 'A letter, neither the first nor the last of the alphabet';
  }
}

// getMessage('a') => 'First letter of the english alphabet'
// getMessage('z') => 'Last letter of the english alphabet'
// getMessage('l') => 'A letter, neither the first nor the last of the alphabet'
// getMessage('k') => 'A letter, neither the first nor the last of the alphabet'
```

The behaviour of the function remains the same, but returning directly from the switch statement avoids the possible omission of the `break` statement.

## Conditional Expression Switch Pattern

Another pattern of using the switch statement is to compare each case using an expression:

```php
function compareSum(int $sum): string
{
  switch (true) {
    case $sum < 10:
      return 'Less than 10';
    case $sum > 10:
      return 'More than 10';
    default:
      return 'Sum is 10';
  }
}
```

This provides some flexibility to write more varied expressions and compose functions when evaluating which `case` branch to execute.
