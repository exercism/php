# Auto Creating of tests for Exercism PHP Track

This is a small poc on how we could auto generate tests for the PHP track based on the https://github.com/exercism/problem-specifications/.

How to test it:

```
git clone https://github.com/tomasnorre/exercism-tests-generation.git
cd exercism-tests-generation
composer install
bin/console app:create-tests
vendor/bin/phpunit src/Command/NucleotideCountTest.php
```

If you now make a `git status` you will see that the `src/Command/NucleotideCountTest.php` and you can now inspect the auto generated tests.

It's all based on the `nikic/php-parser` and the https://github.com/exercism/problem-specifications/ repository, I have made a local copy of that on file
for now to spare the http-requests.

Let me know what you think.
