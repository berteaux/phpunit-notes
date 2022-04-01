FROM php:8.0-fpm

# Install git
RUN apt-get -y update
RUN apt-get -y install git

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer