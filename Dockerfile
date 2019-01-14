FROM php:7.3-apache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get install -y git && \
    apt-get install -y zip && \
    apt-get install -y unzip

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /app/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . /app

RUN chown -R www-data:www-data /app && \
    chmod -R 750 /app/ && \
    chmod -R 770 /app/storage