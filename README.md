# xPHP

[![Build Status](https://travis-ci.org/exercism/xphp.svg?branch=master)](https://travis-ci.org/exercism/xphp)

Exercism exercises in PHP

## Install Dependencies

### All dependencies

	% make install

### Only tests dependencies

	% make install-test

### Only style-check dependencies

	% make install-style

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

## Help
If you need command line help for run make commands

	% make

## Contributing

- Follow the [PSR-2] coding style (xPHP uses a slightly [modified] version of [PSR-2]).
- Follow the [contributing guide].



[PSR-2]: http://www.php-fig.org/psr/psr-2
[contributing guide]: https://github.com/exercism/x-api/blob/master/CONTRIBUTING.md#the-exercise-data
[@group annotation]: http://phpunit.de/manual/4.1/en/appendixes.annotations.html#appendixes.annotations.group
[modified]: phpcs-xphp.xml

