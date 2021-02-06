#!/usr/bin/env bash

set -euo pipefail

curl -Lo ./bin/phpunit-8.phar https://phar.phpunit.de/phpunit-8.phar
chmod +x bin/phpunit-8.phar
