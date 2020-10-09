### Which version to chose?

We encourage to use a stable PHP release with active support. Currently this is **PHP 7.3 and 7.4**. Details on current releases and their timelines can be found at [php.net/supported-versions](https://www.php.net/supported-versions.php).

### Install PHP

PHP can be downloaded and built from source, available at [php.net/downloads.php](http://php.net/downloads.php) or [windows.php.net/download](https://windows.php.net/download).

> Note: A web server such as nginx or Apache HTTP server is not required to complete the exercises.

#### Linux

Different distributions have different methods. You should be able to

```bash
$ yum install php
```

or

```bash
$ apt-get install php
```

depending on your repository manager.

For further instructions, read the manual on [Installation on Unix systems](https://www.php.net/manual/en/install.unix.php).

#### macOS

Normally macOS comes with PHP installed, but it is often an outdated version. There are other pre-built options available, including [MAMP](http://www.mamp.info/en/) and [php-osx.liip.ch](https://php-osx.liip.ch/).

For further instructions, read the manual on [Installation on macOS](https://www.php.net/manual/en/install.macosx.php).

#### Windows

Official PHP binaries for Windows can be downloaded from [windows.php.net/download](https://windows.php.net/download).

There are pre-built stacks including [WAMP](http://www.wampserver.com/en/) - (Windows, Apache, MySQL, PHP) and [XAMPP](https://www.apachefriends.org/de/index.html).

For further instructions, read the manual on [Installation on Windows systems](https://www.php.net/manual/en/install.windows.php).

#### Other

If you want to use a different OS, see instruction on [php.net/manual/en/install](https://www.php.net/manual/en/install.php).

### Install PHPUnit

#### Via Composer

PHPUnit version 8 can be installed globally via [Composer](https://getcomposer.org), using the following command.

```bash
> composer global require phpunit/phpunit ^8
```

#### Manual installation

If you are not using Composer package manager, follow the official [Installing PHPUnit instructions](https://phpunit.readthedocs.io/en/8.5/installation.html).
