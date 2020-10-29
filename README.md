# PHP

[![Configlet Status](https://github.com/exercism/php/workflows/Configlet%20CI/badge.svg)]
[![Exercise Test Status](https://github.com/exercism/php/workflows/Exercise%20tests/badge.svg)]
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/68242198cd124a3ebcbdc291d0e0eda4)](https://www.codacy.com/app/borgogelli/php?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=borgogelli/php&amp;utm_campaign=Badge_Grade)

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

- Follow the [PSR-2] coding style (PHP uses a slightly [modified] version of [PSR-2]).
- Follow the [contributing guide].



[PSR-2]: http://www.php-fig.org/psr/psr-2
[contributing guide]: https://github.com/exercism/x-api/blob/master/CONTRIBUTING.md#the-exercise-data
[@group annotation]: http://phpunit.de/manual/4.1/en/appendixes.annotations.html#appendixes.annotations.group
[modified]: phpcs-php.xml

