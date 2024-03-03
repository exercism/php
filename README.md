# Exercism PHP Track

Exercism exercises in PHP

Follow these instructions to contribute to the PHP track.
To solve the exercises, head to the [PHP track][exercism-track-home] and check the [documentation][exercism-track-installation].

## Install Dependencies

The following system dependencies are required:

- `composer`, as recommended in the [PHP track installation docs][exercism-track-installation-composer].
- [`bash` shell][gnu-bash]
- PHP V8.2+ CLI

Run the following commands to get started with this project:

```shell
bin/fetch-configlet # The official tool for managing Exercism language track repositories
composer install # Required dependencies to develop this track
```

## Running Exercism resources management

`bin/configlet` is a tool to manage exercism resources in this track.
See [Building Exercism docs][exercism-configlet].

## Running Unit Test Suite

The tests are run with PHPUnit. A shell loop injecting `exemplar.php` is provided to ease testing.

Execute the following command to run the tests:

```shell
composer test:run
```

## Running Style Checker

This project use a slightly [modified][local-file-phpcs-config] version of [PSR-12].
Use the following commands to apply code style:

```shell
composer lint:check # Checks the files against the code style rules
composer lint:fix # Automatically fix codestyle issues
```

## Contributing

- Read the documentation at [Exercism][exercism-docs].
- Follow the [PSR-12] coding style (Exercisms PHP track uses a slightly [modified][local-file-phpcs-config] version of [PSR-12]).
- CI is run on all pull requests, it must pass the required checks for merge.
- CI is running all tests on PHP 8.0 to PHP 8.2

## Generating new practice exercises

Use `bin/configlet create --practice-exercise <slug>` to create the exercism resources required.
This provides you with the directories and files in `exercises/practice/<slug>`.
Look into `tests.toml` for which test cases **not** to implement / generate and mark them with `include = false`.

Test generator MVP used like this:

```shell
composer -d contribution/generator install
contribution/generator/bin/console app:create-tests '<slug>'
composer lint:fix
```

[exercism-configlet]: https://exercism.org/docs/building/configlet
[exercism-docs]: https://exercism.org/docs
[exercism-track-home]: https://exercism.org/docs/tracks/php
[exercism-track-installation]: https://exercism.org/docs/tracks/php/installation
[exercism-track-installation-composer]: https://exercism.org/docs/tracks/php/installation#h-install-composer
[gnu-bash]: https://www.gnu.org/software/bash/
[local-file-phpcs-config]: phpcs.xml
[psr-12]: https://www.php-fig.org/psr/psr-12
