## Making the Test Suite Pass

First [get composer](https://getcomposer.org/download/) and fetch [PHPUnit](http://phpunit.de/):

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install
```

Execute the tests with:

```bash
$ php vendor/bin/phpunit Trinary
```

All but the first test have been skipped.

Once you get a test passing, you can unskip the next one by removing the `@group` annotation, e.g:

```php
/** @group skipped */
public function testFoo() { ... }
```

becomes:

```php
public function testFoo() { ... }
```
