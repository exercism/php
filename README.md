# Exercism PHP Track

Exercism exercises in PHP

Follow these instructions to contribute to the PHP track.
To solve the exercises, head to the [PHP track][exercism-track-home] and check the [documentation][exercism-track-installation].

## Quick Start with Dev Containers

This repo includes a [dev container](.devcontainer) that provides PHP 8.4, Composer, `jq` and all other dependencies out of the box.
Open the repo in [VS Code][vscode-devcontainers] (or [GitHub Codespaces][github-codespaces]) and select "Reopen in Container" - `composer install` runs automatically once it starts.

## Install Dependencies

The following system dependencies are required:

- `composer`, as recommended in the [PHP track installation docs][exercism-track-installation-composer].
- [`bash` shell][gnu-bash].
- PHP V8.4+ CLI, with the following extensions:
  - `ds` (V1.x)
  - `intl`
  - Default modules: `Core`, `ctype`, `date`, `dom`, `fileinfo`, `filter`, `hash`, `iconv`, `json`, `libxml`, `mbstring`, `pcre`, `random`, `Reflection`, `SimpleXML`, `sodium`, `SPL`, `standard`, `tokenizer`, `xml`, `xmlreader`, `xmlwriter`, `zlib`
- An active Internet connection for installing required tools / composer packages.
- [`jq`][jq], if you change the difficulty or add a practice exercise.

The [dev container](.devcontainer) already provides all of the above.

Run the following command to get started with this project:

```shell
composer install # Required dependencies to develop this track
```

## Running Exercism resources management

`bin/configlet` is the official tool for managing Exercism language track repositories.
See [Building Exercism docs][exercism-configlet].

For convenience, you can use `composer configlet:fmt` to fix formatting issues in the Exercism track files.
This is included in `composer ci` to run the CI checks locally.

## Running Unit Test Suite

The tests are run with PHPUnit. A shell loop injecting `exemplar.php` is provided to ease testing.

Execute the following command to run the tests:

```shell
composer test:run
```

This is included in `composer ci` to run the CI checks locally.

### Run a specific test

If you want to run tests for one specific exercise, you can do it with following cli command.

```shell
composer test:run -- exercise-name
# e.g
composer test:run -- book-store
```

If you want to run all starting with let's say 'b' you can run

```shell
composer test:run -- "b*"
```

## Running Style Checker

This project uses a slightly [modified][local-file-phpcs-config] version of [PSR-12].
Use the following commands to apply code style:

```shell
composer lint:check # Checks the files against the code style rules
composer lint:fix # Automatically fix code style issues
```

The `lint:check` is included in `composer ci` to run the CI checks locally.

## Contributing

- Read the documentation at [Exercism][exercism-docs].
- Follow the [PSR-12] coding style (Exercisms PHP track uses a slightly [modified][local-file-phpcs-config] version of [PSR-12]).
- Run `composer ci` to run CI checks locally before pushing.
- CI is run on all pull requests, it must pass the required checks for merge.
- CI is running all tests on PHP 8.1 to PHP 8.4 for Linux, Windows and MacOS.

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

Run `bin/order-exercises.sh` when you set the exercise difficulty to a sensible value to order the exercises on the website accordingly.

[exercism-configlet]: https://exercism.org/docs/building/configlet
[exercism-docs]: https://exercism.org/docs
[exercism-track-home]: https://exercism.org/docs/tracks/php
[exercism-track-installation]: https://exercism.org/docs/tracks/php/installation
[exercism-track-installation-composer]: https://exercism.org/docs/tracks/php/installation#h-install-composer
[github-codespaces]: https://docs.github.com/en/codespaces/overview
[gnu-bash]: https://www.gnu.org/software/bash/
[jq]: https://jqlang.org/
[local-file-phpcs-config]: phpcs.xml
[psr-12]: https://www.php-fig.org/psr/psr-12
[vscode-devcontainers]: https://code.visualstudio.com/docs/devcontainers/containers
