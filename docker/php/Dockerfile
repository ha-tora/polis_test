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

RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring zip exif pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/polis_test

RUN chown -R www-data:www-data /var/www/polis_test \
&& chmod -R 755 /var/www/polis_test \
&& chmod -R 775 /var/www/polis_test/storage /var/www/polis_test/bootstrap/cache

VOLUME /var/www/polis_test

WORKDIR /var/www/polis_test

USER www-data

CMD [ "php-fpm" ]

EXPOSE 9000

