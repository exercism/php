Commands to automate some contribution part of `exercism/php`.

They are all invokable with `php main.php <command>`.

## `exercism:deprecated`

checks upstream deprecated exercises

## `exercism:create-tests`

This is a small poc on how we could auto generate tests for the PHP track based on the https://github.com/exercism/problem-specifications/.

How to test it:

```
git clone https://github.com/tomasnorre/exercism-tests-generation.git
cd exercism-tests-generation
composer install
php main.php exercism:create-tests nucleotide-count
vendor/bin/phpunit src/Command/NucleotideCountTest.php
```

If you now make a `git status` you will see that the `src/Command/NucleotideCountTest.php` and you can now inspect the auto generated tests.

It's all based on the `nikic/php-parser` and the https://github.com/exercism/problem-specifications/ repository, I have made a local copy of that on file
for now to spare the http-requests.

Let me know what you think.

## `exercism:generate-tests`

Generate tests from a twig template file
