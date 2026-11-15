# Exercism PHP Track

Exercism exercises in PHP

Follow these instructions to contribute to the PHP track.
To solve the exercises, head to the [PHP track][exercism-track-home] and check the [documentation][exercism-track-installation].

## Quick Start

### Dev containers

This repo includes a [dev container](.devcontainer) that provides PHP 8.4, `composer`, `jq` and all other dependencies out of the box.
Open the repo in [VS Code][vscode-devcontainers] (or [GitHub Codespaces][github-codespaces]) and select "Reopen in Container".

### Local

For a non-devcontainer setup, see `.devcontainer/` for exact setup.

In particular the required dependencies are: `bash`, `jq`, `php8.4`, `composer`, `ext-gmp`, `ext-ds` (v1.x), `ext-intl`.

Install composer dependencies with: 
```shell
~/> composer install
contribution/> composer install
```

## PHP track maintenance

[`bin/configlet`][exercism-configlet] is the official tool for managing Exercism language track repositories.

### Running Unit Test Suite

The tests are run with PHPUnit. Execute the following command to run the tests:

```shell
~/> composer tests:run # Runs whole test suite
~/> composer tests:run -- <slug> # Runs tests for <slug> (e.g. book-store)
~/> composer tests:run -- "b*" # Runs tests for <slug> starting with `b`
```

### Code style

[`bin/configlet fmt`][exercism-configlet-fmt] checks Exercism's ressources files (json).

`composer lint:check` checks PHP files using a slightly [modified][local-file-phpcs-config] version of [PSR-12].

Autofix (for both Exercism and PHP files) is provided with `composer format:fix`.

### Continuous Integration

`composer ci` invokes the above checks: [code style][h-code-style], [tests][h-unit-tests].

## Contributing

- Read the documentation at [Exercism][exercism-docs].
- Follow the [PSR-12] coding style (Exercism's PHP track uses a slightly [modified][local-file-phpcs-config] version of [PSR-12]).
- Run `composer ci` to run CI checks locally before pushing.
- CI runs on all pull requests, it must pass the required checks for merge.
- CI runs all tests on PHP 8.2 to PHP 8.4 for Linux, Windows and MacOS.
- [Contribution tools](./contribution/README.md) are available.

### Generating new practice exercises

Adding a new exercise involves multiple steps

#### 1. Initialize exercism resources

Use `bin/configlet create --practice-exercise <slug>` to create the exercism resources required.
This provides you with the directories and files in `exercises/practice/<slug>`.
Look into `tests.toml` for which test cases **not** to implement / generate and mark them with `include = false`.

#### 2. Write tests

Once the directory structure is created either:
1. Use `php contribution/main.php exercism:test:bootstrap <slug>` to init a test file with tests bodies to implement.
2. Create a `<ExerciseSlug>Test.php.twig` file and run `php contribution/main.php exercism:test:generate <slug>` to render the corresponding `<ExerciseSlug>Test.php` file.

A `.meta/example.php` file is also necessary in order to validate that the implementation is correct / achievable.

#### 3. Miscellaneous

Run `bin/order-exercises.sh` when you set the exercise difficulty to a sensible value to order the exercises on the website accordingly.

Ensures that the [test suite runs][h-unit-tests] and that the files are properly [formatted][h-code-style].

[exercism-configlet]: https://exercism.org/docs/building/configlet
[exercism-configlet-fmt]: https://exercism.org/docs/building/configlet/format
[exercism-docs]: https://exercism.org/docs
[exercism-track-home]: https://exercism.org/docs/tracks/php
[exercism-track-installation]: https://exercism.org/docs/tracks/php/installation
[github-codespaces]: https://docs.github.com/en/codespaces/overview
[local-file-phpcs-config]: phpcs.xml
[psr-12]: https://www.php-fig.org/psr/psr-12
[vscode-devcontainers]: https://code.visualstudio.com/docs/devcontainers/containers
[h-code-style]: #code-style
[h-unit-tests]: #running-unit-test-suite
