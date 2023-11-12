# start with the official Composer image and name it
FROM composer:2.6.5 AS composer

# Use the official PHP 8.2 image as the base image
FROM php:8.2-fpm

# copy the Composer PHAR from the Composer image into the PHP image
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    nano \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

# Install MySQL client
RUN apt-get update && apt-get install -y default-mysql-client

# Set the working directory to /var/www
WORKDIR /var/www/html

COPY . .

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Create a user named "php" with a specific user ID and group ID
#RUN groupadd -r php && useradd -r -g php php

# Switch to the "php" user for subsequent instructions
#USER php


# Start PHP-FPM
CMD ["php-fpm"]

RUN echo 'alias pa="php artisan"' >> ~/.bashrc

# Optionally, you can add your application code by copying it into the container
# COPY . /var/www
