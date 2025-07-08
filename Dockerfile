FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libsqlite3-dev \
    sqlite3

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /app

# Copy files
COPY . /app

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate key (optional here, better use APP_KEY from env)
# RUN php artisan key:generate

# Expose port and start Laravel
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
