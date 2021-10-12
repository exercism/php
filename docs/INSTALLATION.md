# Installation

## Which version to chose?

We encourage to use a stable PHP release with active support. Currently this is **PHP 7.3, 7.4 and 8.0**. Details on current releases and their timelines can be found at [php.net/supported-versions](https://www.php.net/supported-versions.php). PHP 7.3 is only supported until December 2021, so PHP 7.4 or 8.0 are preferred. Version 8.1 will be available in late November 2021.

## Install PHP

PHP can be downloaded and built from source, available at [php.net/downloads.php](http://php.net/downloads.php) or [windows.php.net/download](https://windows.php.net/download).

> Note: A web server such as nginx or Apache HTTP server is not required to complete the exercises.

### Linux

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

### macOS

Normally macOS comes with PHP installed, but it is often an outdated version. We recommended installing php through [HomeBrew](https://brew.sh/). Install HomeBrew by copy pasting the command found [here](https://brew.sh/) under ‘Install Homebrew’ in your terminal.

To confirm its installation try the following command, it should output Homebrew 3.2.x at the time of this writing.
```bash
$ brew --version 
```

Install php via homebrew
```bash
$ brew install php@8.0
```

This should display the now installed version of php, which is php 8.0.x as of this writing.
```bash
$ php -v
```

For further instructions, read the manual on [Installation on macOS](https://www.php.net/manual/en/install.macosx.php).

### Windows

Official PHP binaries for Windows can be downloaded from [windows.php.net/download](https://windows.php.net/download).

There are pre-built stacks including [WAMP](http://www.wampserver.com/en/) - (Windows, Apache, MySQL, PHP) and [XAMPP](https://www.apachefriends.org/de/index.html).

For further instructions, read the manual on [Installation on Windows systems](https://www.php.net/manual/en/install.windows.php).

### Other

If you want to use a different OS, see instruction on [php.net/manual/en/install](https://www.php.net/manual/en/install.php).

### Install Composer
Install [Composer](https://getcomposer.org) [here](https://getcomposer.org/doc/00-intro.md) following your devices OS installation instructions. We recommend installing it globally for ease of use. 

### Install PHPUnit

#### Via Composer

PHPUnit version 9 can be installed globally via [Composer](https://getcomposer.org), using the following command.

```bash
> composer global require phpunit/phpunit ^9
```

It you are using PHP 8+ make sure you install at version 9.5 or later.

#### Manual installation

If you are not using Composer package manager, follow the official [Installing PHPUnit instructions](https://phpunit.readthedocs.io/en/9.5/installation.html).
