# Series

Given a string of digits, output all the contiguous substrings of length `n` in
that string.

For example, the string "49142" has the following 3-digit series:

- 491
- 914
- 142

And the following 4-digit series:

- 4914
- 9142

And if you ask for a 6-digit series from a 5-digit string, you deserve
whatever you get.

Note that these series are only required to occupy *adjacent positions*
in the input; the digits need not be *numerically consecutive*.


## Running the tests

1. Go to the root of your PHP exercise directory, which is `<EXERCISM_WORKSPACE>/php`.
   To find the Exercism workspace run

        % exercism debug | grep Workspace

1. Get [PHPUnit] if you don't have it already.

        % wget --no-check-certificate https://phar.phpunit.de/phpunit.phar
        % chmod +x phpunit.phar

2. Execute the tests:

        % ./phpunit.phar series/series_test.php

[PHPUnit]: http://phpunit.de


## Source

A subset of the Problem 8 at Project Euler [http://projecteuler.net/problem=8](http://projecteuler.net/problem=8)

## Submitting Incomplete Solutions
It's possible to submit an incomplete solution so you can see how others have completed the exercise.
