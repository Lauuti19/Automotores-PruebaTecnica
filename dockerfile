FROM php:8.2-apache

RUN docker-php-ext-install mysqli
RUN a2enmod rewrite

RUN docker-php-ext-enable mysqli
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

