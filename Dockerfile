FROM webdevops/php-nginx:7.4-alpine
# Install Laravel framework system requirements (https://laravel.com/docs/8.x/deployment#optimizing-configuration-loading)
RUN apk add oniguruma-dev postgresql-dev libxml2-dev
RUN docker-php-ext-install \
        bcmath \
        ctype \
        fileinfo \
        json \
        mbstring \
        pdo_mysql \
        pdo_pgsql \
        tokenizer \
        xml
# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV WEB_DOCUMENT_ROOT /app
ENV APP_ENV production
WORKDIR /app
COPY . .
RUN composer update
RUN chown -R www-data storage
# Optimizing Configuration loading
RUN php artisan cache:clear
RUN php artisan config:clear

# Optimizing Route loading
RUN php artisan route:clear
# Optimizing View loading
RUN php artisan view:cache
RUN chown -R application:application .