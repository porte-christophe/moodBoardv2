FROM php:8.5-fpm

WORKDIR /app

COPY --link \
    --from=ghcr.io/symfony-cli/symfony-cli:latest \
    /usr/local/bin/symfony /usr/local/bin/symfony

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . .

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git && \
    apt-get install -y unzip 

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN symfony local:php:refresh

RUN symfony server:ca:install

RUN composer install

CMD ["symfony", "server"]