# Exercism PHP Track

![Configlet Status](https://github.com/exercism/php/workflows/Configlet%20CI/badge.svg)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/68242198cd124a3ebcbdc291d0e0eda4)](https://www.codacy.com/app/borgogelli/php?utm_source=github.com&utm_medium=referral&utm_content=borgogelli/php&utm_campaign=Badge_Grade)

Exercism exercises in PHP

## Install Dependencies

### All dependencies

```shell
> ./bin/install.sh
```

### Only tests dependencies

```shell
> ./bin/install-phpunit-9.sh
```

### Only style-check dependencies

```shell
> ./bin/install-phpcs.sh
```

## Running Unit Test Suite

### PHPUnit 9

```shell
> PHPUNIT_BIN="./bin/phpunit-9.phar" ./bin/test.sh
```

## Running Style Checker

### PSR-12 rules

```shell
> PHPCS_BIN="./bin/phpcs.phar" PHPCS_RULES="./phpcs-php.xml" ./bin/lint.sh
```

## Contributing

- Read the documentation at [Exercism][docs].
- Follow the [PSR-12] coding style (PHP uses a slightly [modified] version of [PSR-12]).
- CI is run on all pull requests, it must pass the required checks for merge.

[psr-12]: https://www.php-fig.org/psr/psr-12
[docs]: https://exercism.org/docs
[@group annotation]: https://phpunit.de/manual/4.1/en/appendixes.annotations.html#appendixes.annotations.group
[modified]: phpcs-php.xml
