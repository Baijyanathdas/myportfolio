# Use PHP 8.2 CLI as the base image
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libsqlite3-dev \
    sqlite3 \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring tokenizer xml zip gd

# Copy existing application code (optional, depending on your Docker context)
# COPY . .

# Expose port (optional if you're using a web server like Nginx or Apache externally)
EXPOSE 8000

# Start Laravel's built-in server (optional)
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
