FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and build libraries
RUN apk add --no-cache \
    bash \
    curl \
    git \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    oniguruma-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    mysql-client

# Configure & Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Expose PHP-FPM port
EXPOSE 9000

CMD ["php-fpm"]
