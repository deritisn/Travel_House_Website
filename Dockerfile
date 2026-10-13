FROM php:8.3-apache
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html
COPY composer.json ./
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN apt-get update && apt-get install -y --no-install-recommends unzip \
	&& rm -rf /var/lib/apt/lists/*
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
COPY . .
RUN a2enmod rewrite
EXPOSE 80
