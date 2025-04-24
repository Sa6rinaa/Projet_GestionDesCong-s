FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Enable Apache modules
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Configure PHP
COPY php.ini /usr/local/etc/php/conf.d/app.ini

# Configure Apache
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
