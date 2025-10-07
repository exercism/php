# Instructions append

## Maximum integer value

According to [the PHP docs][php-int] there is a maximum integer value:

> The size of an `int` is platform-dependent, although a maximum value of about two billion is the usual value (that's 32 bits signed).
> 64-bit platforms usually have a maximum value of about 9E18.
> PHP does not support unsigned `int`s.

In other words, PHP cannot express any number `2^63` or greater as an integer.
Some of the tests for this exercise require 64 bit integers (`2^64`) which is beyond the integer size limitation of PHP.

[PHP automatically converts][php-int-to-float] `int`s to `float`s, when the numbers get too big:

> If PHP encounters a number beyond the bounds of the `int` type, it will be interpreted as a `float` instead.
> Also, an operation which results in a number beyond the bounds of the `int` type will return a `float` instead.

But the `float` type [has limited precision][php-float-precision].
And King hates unprecision.
So King decided to expect the results of the calculations as a string which expresses the integer value, rather than expressing the answer as `int` or `float`.
And he wants integer calculations, not just a lazy conversion at the end.

Can you solve this by avoiding numbers that are larger than the language will allow directly?
And please don't use other PHP libraries like `gmp` or `bc`, too.

[php-int]: https://www.php.net/manual/en/language.types.integer.php
[php-int-to-float]: https://www.php.net/manual/en/language.types.integer.php
[php-float-precision]: https://php.net/manual/en/language.types.float.php