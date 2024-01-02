FROM php:8.3-apache

WORKDIR /var/www/html

COPY index.php index.php
COPY src/ src
EXPOSE 80

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-dev

COPY my-apache-site.conf /etc/apache2/sites-available/my-apache-site.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&
    a2enmod rewrite &&
    a2dissite 000-default &&
    a2ensite my-apache-site &&
    service apache2 restart

