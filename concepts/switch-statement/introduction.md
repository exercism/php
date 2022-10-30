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
