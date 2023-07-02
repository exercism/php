# Break, Continue

When using a looping or iterating control structure, the `break` and `continue` keywords can assist to control the flow of a program.
The `break` keyword breaks out of the loop context into the outer scope, thus terminating the loop.
The `continue` keyword skips the remainder of the current iteration and restarts the loop context at the beginning of the next iteration.
While uncommon, a number may be supplied with the keyword to control how many contexts to either break out of or skip to the next iteration.

```php
<?php
$i = 1;
while ($i <= 10) {

    if ($i <= 5) {
        i += 1;
        continue;
    }
    break;
}
```

In the previous example, `continue` is executed five (5) times, but on the sixth (6) iteration `break` is executed, causing the code to exit the loop.
