FROM php:8.3-fpm

# Asosiy tizim paketlari
RUN apt-get update && apt-get install -y \
    git \
    zip unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    curl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        bcmath \
        gd \
        zip && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer o‘rnatish
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP konfiguratsiya (agar kerak bo‘lsa)
COPY ./_docker/images/php/conf.d/php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www