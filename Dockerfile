FROM php:8.3

# Install common PHP extensions and configurations
RUN apt-get update && \
    apt-get install -y \
    default-mysql-client \
    zlib1g-dev \
    libzip-dev \
    autoconf \
    gcc \
    g++ \
    make \
    pkg-config

# Configure and install PHP extensions
RUN docker-php-ext-configure pdo_mysql && \
    docker-php-ext-install pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app


RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=10000
EXPOSE 10000
