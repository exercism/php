# xPHP

[![Build Status](https://travis-ci.org/exercism/xphp.png?branch=master)](https://travis-ci.org/exercism/xphp)

Exercism exercises in PHP

## Running Unit Test Suite

### All Assignments

    % make test

### Single Assignment

    % make test-assignment ASSIGNMENT=wordy

## Running Style Checker

### All Assignments

    % make style-check

### Single Assignment

    % make style-check-assignment ASSIGNMENT=wordy

## Contributing

- Follow the [PSR-2] coding style (xPHP uses a slightly [modified] version of [PSR-2]).
- Follow the [contributing guide].
- Add all but the first test to the group `skipped` with the [@group annotation], the provided phpunit.xml will exclude this group so the user can pass one test a time.

## License

The MIT License (MIT)

Copyright (c) 2014 Katrina Owen, _@kytrinyx.com


[PSR-2]: http://www.php-fig.org/psr/psr-2
[contributing guide]: https://github.com/exercism/x-api/blob/master/CONTRIBUTING.md#the-exercise-data
[@group annotation]: http://phpunit.de/manual/4.1/en/appendixes.annotations.html#appendixes.annotations.group
[modified]: phpcs-xphp.xml

