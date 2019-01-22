# Wedding Work - Laravel based wedding website framework
## Installation
1. clone this repo
2. `cp .env-example .env`
3. `docker-compose build`
3. `docker-compose up -d`
    1. For production: `docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d`
4. `docker exec -it ww_app composer install`
5. `docker exec -it ww_app php artisan key:generate`
6. `docker exec -it ww_app php artisan migrate`

### Create Admin User

Run `docker exec -it ww_app php artisan admin:user:create admin@email.com password` to create your default admin user.

# Deployment

If you don't want to create a full CI/CD pipeline for this, you can simple follow the install steps above on your own server and run the following:

1. `chmod +x update.sh`
2. `./update.sh`

NOTE: this is not ideal and there will be some downtime during deploy, so use at your own risk!

# Customizing

## Frontend

All templates are currently under `resources/views` directory.

For CSS/Styles, Wedding Work uses Laravel Mix.

Install NodeJS/NPM and run `npm run dev`

This should compile all frontend assets.
Note: `resources/sass/static` and `resources/js/static` are from the original theme which was not in a sass format.

Further tweaks can be made via the config `config/wedding.php` including dates, names etc.

## Import / Export

There are currently 2 very basic console commands for importing/export data from CSV.

### Import

Assuming your CSV files are in the following format:
Note: `1` in the guest columns defines a "Plus one".
```
smith party, john smith
           , jane smith
           , jimmy smith
uncle jim, jim bloggs
         , 1
```

If running inside the docker container, you will need to cp the csv into the container:

1. `docker cp bride.csv ww_app:/app/`
2. `docker exec -it ww_app php artisan guests:import bride.csv`

