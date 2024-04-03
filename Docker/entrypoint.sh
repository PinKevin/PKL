#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    echo "Vendor isn't available, creating..."
    composer install --no-progress --no-interaction
else
    echo "Vendor is available, skipping..."
fi

if [ ! -f ".env" ]; then
    echo "Creating .env file..."
    cp .env-docker .env
else
    echo ".env is exists, skipping ..."
fi

php artisan key:generate

# Check if storage link exists
if [ ! -L "public/storage" ]; then
    echo "Creating storage link..."
    php artisan storage:link
else
    echo "Storage link already exists, skipping..."
fi

php artisan migrate

# Check if the database has been seeded before
if [ ! -f ".seeded" ]; then
    echo "Seeding database for the first time..."
    php artisan db:seed
    touch .seeded
else
    echo "Database has been seeded before, skipping..."
fi

php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Run npm run build if not already built
if [ ! -d "public/build" ]; then
    echo "Building assets..."
    npm run build
fi

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
