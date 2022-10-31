FROM php:8.1-fpm

ARG user=root
ARG uid=1000

COPY composer.json  ./

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    cron \
    unzip \
    default-mysql-client \
    redis-tools

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

ENV DOCUMENT_ROOT /var/www/

WORKDIR ${DOCUMENT_ROOT}

COPY ./ ${DOCUMENT_ROOT}

COPY .env.example .env

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-interaction

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user && \
    chown -R $user:$user ${DOCUMENT_ROOT}

RUN chmod 775 -R ${DOCUMENT_ROOT} && \
    chmod 777 -R "${DOCUMENT_ROOT}storage" && \
    chmod 777 -R "${DOCUMENT_ROOT}bootstrap/cache" && \
    chown -R $user:$user ${DOCUMENT_ROOT}

ENV PHP_MEMORY_LIMIT=2048M

USER $user

EXPOSE 81
