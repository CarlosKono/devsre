FROM php:7.3-fpm-alpine

WORKDIR /var/www

# lumen/laravel packages
RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql

# copy config
COPY ./config/php/local.ini /usr/local/etc/php/conf.d/local.ini

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# create user and group www
RUN addgroup -g 1000 -S www && \ 
    adduser -u 1000 -S www -G www

USER www

# copy files
COPY --chown=www:www ./ /var/www

RUN composer install --no-dev --prefer-dist --optimize-autoloader && \
    composer clear-cache

EXPOSE 9000 