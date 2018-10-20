FROM php:7.2-cli
COPY . /app
WORKDIR /app

RUN  apt-get update \
  && apt-get install -y wget \
  && rm -rf /var/lib/apt/lists/*

RUN wget --no-check-certificate https://phar.phpunit.de/phpunit.phar -O bin/phpunit.phar
RUN chmod +x bin/phpunit.phar

RUN wget --no-check-certificate https://phar.phpunit.de/phpunit.phar -O bin/phpcs.phar
RUN	chmod +x bin/phpcs.phar
