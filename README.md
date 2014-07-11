# xPHP

[![Build Status](https://travis-ci.org/exercism/xphp.png?branch=master)](https://travis-ci.org/exercism/xphp)

Exercism exercises in PHP

## Running Unit Test Suite

### All Assignments

    % make test

### Single Assignment

    % make test-assignment ASSIGNMENT=Wordy


## Running Style Checker

### All Assignments

    % make style-check
    
### Single Assignment

    % make style-check-assignment ASSIGNMENT=Wordy

## Contributing Guide

Please see the [contributing guide](https://github.com/exercism/x-api/blob/master/CONTRIBUTING.md#the-exercise-data) 
and follow the [PSR-2](http://www.php-fig.org/psr/psr-2/) coding style guide ([PHP-CS-Fixer](https://github.com/fabpot/PHP-CS-Fixer) can be used for auto-formatting).

Add all but the first test to the group `skipped` with the [@group annotation](http://phpunit.de/manual/4.1/en/appendixes.annotations.html#appendixes.annotations.group), the provided phpunit.xml will exclude this
group so the user can pass one test a time.

## License

The MIT License (MIT)

Copyright (c) 2014 Katrina Owen, _@kytrinyx.com

