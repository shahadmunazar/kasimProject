#!/bin/bash

set -e

# Dynamically change to the directory where this script is located
cd "$(dirname "$0")"

echo "Starting deployment..."

git fetch origin
git reset --hard origin/main

export COMPOSER_HOME=/tmp
composer install --no-dev --optimize-autoloader

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

php artisan migrate --force
php artisan optimize

mkdir -p public/uploads
chmod -R 775 storage bootstrap/cache public/uploads

echo "Deployment completed successfully."
