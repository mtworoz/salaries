FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y zip unzip \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

COPY index.php index.php
COPY src/ src
EXPOSE 80

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-dev


