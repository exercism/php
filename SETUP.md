## Making the Test Suite Pass

1. Get [PHPUnit].

        % wget --no-check-certificate https://phar.phpunit.de/phpunit.phar
        % chmod +x phpunit.phar

2. Execute the tests for an assignment.

        % phpunit.phar wordy/wordy_test.php

3. All but the first test have been skipped. For example:


        public function testFoo()
        {
            $this->markTestSkipped();

            ...
        }

4. You can enable the next test by removing the `$this->markTestSkipped();` line; for example, the code above, becomes:

        public function testFoo()
        {
            ...
        }

[PHPUnit]: http://phpunit.de

