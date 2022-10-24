FROM nginx
COPY vhost.conf /etc/nginx/conf.d/

FROM mariadb:latest

FROM php:8.1-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/www

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update
RUN apt-get -y install lsb-release ca-certificates apt-transport-https wget git zip unzip

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli pdo pdo_mysql

RUN apt-get install -y libicu-dev 
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

RUN apt-get install -y libpng-dev libjpeg-dev
RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-enable gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer self-update



WORKDIR /var/www/html
COPY . /var/www/html
EXPOSE 80