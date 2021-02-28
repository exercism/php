#!/usr/bin/env bash

set -euo pipefail

curl -Lo ./bin/phpunit-9.phar https://phar.phpunit.de/phpunit-9.phar
chmod +x bin/phpunit-9.phar
