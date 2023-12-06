# Exercism PHP Track

Exercism exercises in PHP

Follow these instructions, if you want to contribute to the track.
You must have a BASH shell to run the tooling locally.

If you only want to solve the exercises, go to the [track docs][track-docs] and choose your installation option there.

## Install Dependencies

You must have installed `composer` as a global tool as recommended in the [PHP track installation docs][composer-installation-docs].

```shell
bin/fetch-configlet
composer install
```

You now have all tools required to contribute.

## Running Exercism resources management

`bin/configlet` is a tool to manage exercism resources in this track.
See [Building Exercism docs][configlet-docs].

## Running Unit Test Suite

We use PHPUnit 9.6.x and a shell loop injecting `exemplar.php` as the solution for testing:

```shell
composer test:run
```

## Running Style Checker

We use a slightly [modified] version of [PSR-12] and some exceptions:

```shell
composer lint:check
```

To auto-fix the coding styles:

```shell
composer lint:fix
```

## Contributing

- Read the documentation at [Exercism][docs].
- Follow the [PSR-12] coding style (Exercisms PHP track uses a slightly [modified] version of [PSR-12]).
- CI is run on all pull requests, it must pass the required checks for merge.
- CI is running all tests on PHP 8.0 to PHP 8.2

[composer-installation-docs]: https://exercism.org/docs/tracks/php/installation#h-install-composer
[configlet-docs]: https://exercism.org/docs/building/configlet
[docs]: https://exercism.org/docs
[modified]: phpcs-php.xml
[psr-12]: https://www.php-fig.org/psr/psr-12
[track-docs]: https://exercism.org/docs/tracks/php/installation
