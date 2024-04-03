FROM php:8.3 as php

RUN apt-get update -y \
    && apt-get install -y unzip libpq-dev libzip-dev libcurl4-gnutls-dev libpng-dev \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/ \
    && docker-php-ext-install gd pdo pdo_mysql bcmath zip

WORKDIR /var/www
COPY . .

COPY --from=composer:2.6.4 /usr/bin/composer /usr/bin/composer

ENV PORT=8000
ENTRYPOINT [ "docker/entrypoint.sh" ]

# =======================================================================
# node 
FROM node:lts-alpine3.19 AS node

WORKDIR /var/www
COPY . .

RUN npm install

VOLUME /var/www/node_modules
