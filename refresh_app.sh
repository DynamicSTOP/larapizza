#!/bin/bash

cd /var/www/web/laravel
composer install
composer dumpautoload
php artisan migrate:fresh --seed
php artisan cache:clear
npm run dev

echo "DONE"
