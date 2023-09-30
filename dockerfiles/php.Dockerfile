FROM php:8.1-fpm-alpine

WORKDIR /var/www/laravel

#RUN docker-php-ext-install pdo pdo_mysql

RUN apk --no-cache update \
    && apk add --no-cache autoconf g++ make \
    postgresql-dev \
    \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    \
    && docker-php-ext-install pdo_pgsql
