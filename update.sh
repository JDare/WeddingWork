#!/usr/bin/env bash
git pull origin master
docker-compose down
docker-compose build
docker-compose up -d
docker exec -it ww_app composer install -d /app
docker exec -it ww_app php /app/artisan migrate --force
