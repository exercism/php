#!/usr/bin/env bash

set -euo pipefail

curl -Lo bin/phpcs.phar https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
chmod +x bin/phpcs.phar
