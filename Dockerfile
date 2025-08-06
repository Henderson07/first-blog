FROM php:8.0-apache

# Set timezone
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    vim \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Apache config if needed
COPY blog.conf /etc/apache2/sites-available/blog.conf
RUN ln -s /etc/apache2/sites-available/blog.conf /etc/apache2/sites-enabled/blog.conf \
    && a2ensite blog.conf

# Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
