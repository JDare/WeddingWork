FROM php:7.3-apache

## Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

## Install git and zip dependancies
RUN apt-get update && \
    apt-get install -y git && \
    apt-get install -y zip && \
    apt-get install -y curl

## Install NPM for Laravel Mix / Assets
ENV NVM_VERSION v0.34.0
ENV NODE_VERSION v10.15.0
ENV NVM_DIR /usr/local/nvm
RUN mkdir $NVM_DIR
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/$NVM_VERSION/install.sh | bash

ENV NODE_PATH $NVM_DIR/$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh && \
    nvm install $NODE_VERSION && \
    nvm alias default $NODE_VERSION && \
    nvm use default" | bash

## Install MySQL drivers
RUN docker-php-ext-install pdo pdo_mysql

## Setup apache for serving the app
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /app/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

## Copy directory to app
COPY . /app

WORKDIR /app

## Finally install frontend dependancies and run for production
RUN npm install --global cross-env
RUN npm install && npm run production

## Set file permissions for apache and the app
RUN chown -R www-data:www-data /app && \
    chmod -R 750 /app/ && \
    chmod -R 770 /app/storage




