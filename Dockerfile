FROM php:8.3-apache

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN a2enmod rewrite

COPY ./src /var/www/html

WORKDIR /var/www/html


