# Auto Creating of tests for Exercism PHP Track

This is a simple test generator for practice exercises in the PHP track based on the [Exercism common problem specifications][exercism-problem-specifications].

How to use it:

- Follow track README to install track tooling (`configlet`)
- Run from track root:

  ```shell
  bin/configlet create --practice-exercise '<slug>'
  composer -d contribution/generator install
  contribution/generator/bin/console app:create-tests '<slug>'
  composer lint:fix
  vendor/bin/phpunit exercises/practice/'<slug>'/*Test.php
  ```

If you now run a `git status` you will see the generated files.
Adjust the tests as required and mark tests not implemented in `tests.toml` using `include = false`.

## Architecture

It's all based on `nikic/php-parser` and the [cached problem specifications][exercism-problem-specifications].

- TODO: Support nested canonical-data (`cases` in `cases`, see `bottle-song`, `complex-numbers`, `custom-set`, ...)

[exercism-problem-specifications]: https://github.com/exercism/problem-specifications/
