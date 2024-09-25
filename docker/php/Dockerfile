# Use the official PHP image with FPM
FROM php:8.1-fpm

# Set working directory
WORKDIR /usr/src/app

# Install necessary PHP extensions and dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev\
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql zip gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .


# Install PHP dependencies
RUN composer install --no-scripts --no-autoloader

# Set environment variable to skip database connection
# during cache clear or other commands that need it.
# For example, set a non-existent host or a sqlite database in memory.
ENV DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"

# Set executable permissions for bin/console
RUN chmod +x bin/console

# Run composer dump-autoload and clear cache
RUN composer dump-autoload && php bin/console cache:clear

# Set file permissions
RUN chown -R 1000:1000 /usr/src/app
USER 1000:1000
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]