FROM mcr.microsoft.com/devcontainers/php:1-8.2-bullseye

# Required for a postgresql connection
RUN apt-get update && apt-get install -y libpq-dev \
 && docker-php-ext-install pdo_pgsql

# Activate mod_rewrite on Apache
RUN a2enmod rewrite