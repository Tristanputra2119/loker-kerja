FROM php:8.4-rc-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev \
    && docker-php-ext-install pdo_mysql zip gd

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest \
    && apt-get clean

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install

# Install npm dependencies and build assets
RUN npm install && npm run dev

# Expose the required port
EXPOSE 8000
