#!/bin/sh

composer install --no-interaction

cp .env.example .env

php artisan key:generate

chmod 777 -R /var/www/

exit