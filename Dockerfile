# Use the official PHP 8.2 image as the base image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
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

# Start PHP-FPM
CMD ["php-fpm"]

# Optionally, you can add your application code by copying it into the container
# COPY . /var/www
