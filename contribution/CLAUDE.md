# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this directory.

## Scope

This applies to `contribution/` only. It's a grab-bag of standalone maintainer tooling for the Exercism PHP track (see the parent `../CLAUDE.md` for the track itself) — not part of the track content shipped to students, not covered by the root `composer.json`/`phpcs.xml`, and not exercised by `composer ci`.

- `generator/` — a proof-of-concept Symfony console app that auto-generates exercise test files from `problem-specifications` canonical data, using `nikic/php-parser`. Has its own `composer.json` (PHP >=8.2, Symfony 7.0, PHPUnit 11) independent of the root project's dependencies.
- `checkDeprecatedExercises.php` — a standalone PHP script (no dependencies) with a hardcoded list of exercise slugs; it queries GitHub for a `.deprecated` marker on each in `exercism/problem-specifications` and reports which ones should be marked deprecated in the root `config.json` and then removed from the script's own list.

If a directory in here isn't listed above but shows up on disk anyway, check for a `CLAUDE.local.md` in this folder (gitignored, machine-specific) before assuming it's part of the project.

## Commands

```shell
composer -d contribution/generator install                    # install the generator's own dependencies
contribution/generator/bin/console app:create-tests '<slug>'  # generate a test file for an exercise
composer lint:fix                                              # fix style on the generated file, from repo root
```

```shell
php contribution/checkDeprecatedExercises.php   # list exercises that problem-specifications has deprecated
```

## Notes

- The generator is explicitly a PoC ("Let me know what you think" in `generator/README.md`) — treat it as unmaintained/experimental, not a polished tool with guaranteed correctness.
- Generated test files still need to go through the normal track workflow (write/adjust `.meta/example.php`, `.meta/tests.toml`, `composer lint:fix`, `composer test:run -- <slug>`) described in the root `CLAUDE.md`.
