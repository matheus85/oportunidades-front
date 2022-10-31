FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    cron \
    unzip \
    redis-tools

RUN docker-php-ext-install mbstring exif pcntl bcmath gd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

ENV DOCUMENT_ROOT /var/www/

COPY . ${DOCUMENT_ROOT}

WORKDIR ${DOCUMENT_ROOT}

COPY /.docker/start.sh /

RUN chmod +x /start.sh

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV PHP_MEMORY_LIMIT=2048M

EXPOSE 81

CMD [ "/start.sh" ]