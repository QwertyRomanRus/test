FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    libc6-dev \
    make \
    autoconf \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-install pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -LS https://github.com/swoole/swoole-src/archive/master.tar.gz | tar -xz \
    && cd swoole-src-master \
    && phpize \
    && ./configure \
    && make \
    && make install \
    && docker-php-ext-enable swoole

WORKDIR /var/www
COPY . .

EXPOSE 8000
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000", "--workers=1"]
