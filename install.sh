docker-compose up -d
cd client
docker run --rm -v $(pwd):/app composer/composer install  --ignore-platform-reqs
docker-compose run app php artisan key:generate
docker-compose run app php artisan config:cache
cd ..
cd backend
docker-compose run web composer install