FROM php:8.4-fpm 

WORKDIR  /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    iputils-ping \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev && rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    mbstring \
    exif \
    pcntl


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer 

