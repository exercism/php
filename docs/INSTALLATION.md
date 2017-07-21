PHP can be downloaded and built from source, available at [php.net/downloads.php](http://php.net/downloads.php)

Alternatively there are many pre-compiled versions available for [different operating systems](http://php.net/manual/en/install.php):

**Windows users**: There are pre-built stacks including [WAMP](http://www.wampserver.com/en/) - (windows, Apache, MySQL, PHP) and [XAMPP](https://www.apachefriends.org/index.html)

**OS X users**: Normally comes with PHP installed, but there are other pre-built options available, including [MAMP](http://www.mamp.info/en/).

**Linux users**: Different distributions have different methods. You should be able to

````$ yum install php````

or

````$ apt-get install php````

depending on your repository manager.


### Install PHPUnit:

To globally install PHPUnit testing framework, you can add it to your global composer file, which you can then add to your environment PATH.

To do this call

````$ composer global require phpunit/phpunit````

If you are not using Composer package manager you can download the phpunit.phar file and add that to your PATH, or project directory as explained here: [PHPUnit](https://phpunit.de/manual/current/en/installation.html)
