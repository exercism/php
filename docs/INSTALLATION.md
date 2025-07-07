# Installation

## Which version to chose?

We encourage to use a stable PHP release with active support.
Currently this is **PHP 8.2, 8.3 and 8.4**.
Details on current releases and their timelines can be found in [the official PHP documentation](https://www.php.net/supported-versions.php).

## Install PHP

Most package managers for Linux / macOS provide pre-built packages.
PHP can be downloaded and built from source, available at [php.net/downloads.php](https://php.net/downloads.php) or [windows.php.net/download](https://windows.php.net/download).

~~~~exercism/note
A web server such as nginx or Apache HTTP server is not required to complete the exercises.
~~~~

### Linux

Different distributions have different methods.
You should be able to

```shell
yum install php
```

or

```shell
apt-get install php
```

depending on your package manager.

For further instructions, read the PHP manual on [Installation on Unix systems](https://www.php.net/manual/en/install.unix.php).

### macOS

While PHP is often bundled with macOS, it is often outdated.
We recommended installing PHP through [Homebrew](https://brew.sh/).
You can install Homebrew following the instructions [on their homepage](https://brew.sh/#install).

To confirm its installation try the following command, it should output Homebrew `4.5.x` at the time of this writing.

```shell
brew --version 
```

Install PHP via homebrew

```shell
brew install php@8.4
```

This should display the now installed version of PHP, at least version `8.2.0`.

```shell
php -v
```

For further instructions, read the manual on [Installation on macOS](https://www.php.net/manual/en/install.macosx.php).

### Windows

Official PHP binaries for Windows can be downloaded from [windows.php.net/download](https://windows.php.net/download).

There are pre-built stacks including [WAMP](https://www.wampserver.com/en/) - (Windows, Apache, MySQL, PHP) and [XAMPP](https://www.apachefriends.org/de/index.html).

For further instructions, read the manual on [Installation on Windows systems](https://www.php.net/manual/en/install.windows.php).

### Docker

If you prefer containerized solutions, you can download [official PHP image from Docker Hub](https://hub.docker.com/_/php).
You will also need [Docker](https://docs.docker.com/engine/install/).

### Other

If you want to use a different OS, see instruction on [php.net/manual/en/install](https://www.php.net/manual/en/install.php).

## Install PHPUnit

~~~~exercism/note
PHPUnit 12 is not supported, yet!
~~~~

### Via PHP Archive (PHAR)

The easiest way to use PHPUnit for Exercism exercises is downloading a distribution that is packaged as a PHP Archive (PHAR), which is also the recommended way to use PHPUnit.
Store the PHAR where you stored the `exercism` CLI to run PHPUnit from wherever you are.

You can download a release of PHPUnit packages as a PHP archive:

```shell
wget -O phpunit.phar https://phar.phpunit.de/phpunit-11.phar
```

Then make the downloaded file executable:

```shell
chmod +x phpunit.phar
```

And move it to the same location as you moved the `exercism` CLI, naming the command `phpunit`:

```shell
mv phpunit.phar ~/bin/phpunit
```

Now you can run `phpunit` from wherever you are, as shown in the [PHP track testing docs](https://exercism.org/docs/tracks/php/tests):

```shell
phpunit --version
```

The output should look like this:

```text
PHPUnit 11.5.45 by Sebastian Bergmann and contributors.
```

You can also follow the official [Installing PHPUnit instructions](https://docs.phpunit.de/en/11.5/installation.html#installing-phpunit) to install PHPUnit.

### Via Composer

PHPUnit version 11 can also be installed via [Composer](https://getcomposer.org).

#### Install Composer

Install [Composer](https://getcomposer.org) following your devices OS [installation instructions](https://getcomposer.org/doc/00-intro.md). We recommend installing it globally for ease of use.

#### Add PHPUnit as global tool

Using the following command:

```shell
composer global require phpunit/phpunit ^11.5
```

Please make sure you install version 11.5 or later.
