# Wedding Work - Laravel based wedding website framework
## Installation
1. clone this repo
2. `cp .env-example .env`
3. `docker-compose build`
3. `docker-compose up -d`
    1. For prod: `docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d`
4. `docker exec -it ww_app composer install -d /app`
5. `docker exec -it ww_app php /app/artisan key:generate`
6. `docker exec -it ww_app php /app/artisan migrate`

## Customizing

All templates are currently under `resources/` directory.

Further tweaks can be made via the config `config/wedding.php` including dates, names etc.