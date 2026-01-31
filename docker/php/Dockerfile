FROM php:8.4-fpm

USER root

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/polis_test

ADD . /var/www/polis_test

RUN chown -R www-data:www-data /var/www/polis_test \
    && chmod -R 755 /var/www/polis_test \
    && chmod -R 775 /var/www/polis_test/storage /var/www/polis_test/bootstrap/cache

USER www-data

CMD [ "php-fpm" ]

EXPOSE 9000

