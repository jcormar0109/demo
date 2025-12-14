FROM php:8.3-fpm

# Librerías del sistema necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libicu-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip \
    curl \
    zlib1g-dev \
    libonig-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    mbstring \
    xml \
    bcmath \
    zip \
    intl \
    exif \
    gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN echo "xdebug.mode=off" > /usr/local/etc/php/conf.d/20-xdebug.ini

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
