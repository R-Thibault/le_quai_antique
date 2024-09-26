# # Use the PHP 8.1 FPM image with Alpine as the base for building
# FROM php:8.1-fpm-alpine AS build

# # Set the working directory
# WORKDIR /usr/src/app

# # Install system dependencies and PHP extensions
# RUN apk --no-cache add \
#     libzip-dev \
#     zip \
#     unzip \
#     git \
#     libpng-dev \
#     libjpeg-turbo-dev \
#     freetype-dev \
#     postgresql-dev \ 
#     bash \
#     && docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install pdo pdo_pgsql zip gd \
#     && apk del --no-cache git

# # Install Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Copy the application code into the container
# COPY . .

# # Install PHP dependencies
# RUN composer install --no-dev --optimize-autoloader --no-scripts

# # Optionally: Install Node.js and build assets if using Webpack Encore
# # Install Node.js (optional step if you are using Webpack Encore or similar for frontend assets)
# RUN apk add --no-cache nodejs npm \
#     && npm install \
#     && npm run build \
#     && apk del --no-cache nodejs npm

# # Set environment variable to use SQLite during build
# ENV DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"

# # Run Symfony commands for production setup
# RUN chmod +x bin/console \
#     && php bin/console cache:clear --env=prod \
#     && php bin/console cache:warmup --env=prod

# # Set ownership of the application directory
# RUN chown -R www-data:www-data /usr/src/app

# # Final stage: Copy only necessary files to the runtime image
FROM php:8.1-fpm-alpine

# Set the working directory
WORKDIR /usr/src/app

# Install necessary runtime dependencies
RUN apk --no-cache add \
    libzip-dev \
    zip \
    unzip \
    git \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    postgresql-dev \ 
    bash \
    nodejs \
    npm \
    nano \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql zip gd \
    && apk del --no-cache git


    
# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
    
# Copy the application code into the container
COPY . .
# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Optionally: Install Node.js and build assets if using Webpack Encore
# Install Node.js (optional step if you are using Webpack Encore or similar for frontend assets)

RUN npm install \
    && npm run build 

# Set environment variables for production
ENV APP_ENV=prod \
    APP_DEBUG=0 \
    DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"

# Run Symfony commands for production setup
RUN chmod +x bin/console \
    && php bin/console cache:clear --env=prod \
    && php bin/console cache:warmup --env=prod

# Set ownership and permissions again (just in case)
RUN chown -R www-data:www-data /usr/src/app

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Use www-data as the default user
USER www-data

# Start the PHP-FPM server
CMD ["php-fpm"]
