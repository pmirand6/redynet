FROM php:7.0-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev

RUN apt-get update && \
     apt-get install -y \
         libzip-dev \
         && docker-php-ext-install zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install mbstring exif pcntl bcmath gd
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


