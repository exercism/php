## Running the tests

1. Go to the root of your PHP exercise directory, which is `<EXERCISM_WORKSPACE>/php`.
   To find the Exercism workspace run

       exercism debug | grep Workspace

2. Get [PHPUnit] if you don't have it already.

       wget -O phpunit https://phar.phpunit.de/phpunit-10.phar
       chmod +x phpunit
       ./phpunit --version

3. Execute the tests:

       ./phpunit test_file.php

   For example, to run the tests for the Hello World exercise, you would run:

       ./phpunit HelloWorldTest.php

[PHPUnit]: https://phpunit.de
