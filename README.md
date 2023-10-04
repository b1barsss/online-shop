# online-shop

Simple project, some CRUD bases

## To start the project, run these commands step by step

Set up laravel .env file:
```bash
sudo cp /src/.env.example /src/.env
```

Start docker containers:
```bash
docker compose up -d nginx
```

To generate APP_KEY (important):
```bash
docker compose run --rm artisan key:generate
```

To install laravel packages:
```bash
docker compose run --rm composer install
```

To migrate tables:
```bash
docker compose run --rm artisan migrate
```

To seed catalog tables:
```bash
docker compose run --rm artisan db:seed 
```

(Optional) To use your any composer commands:
```bash
docker compose run --rm composer {your composer command}
```

(Optional) To use your any artisan commands:
```bash
docker compose run --rm artisan {your artisan command}
```

## To open the project

On browser open the 'localhost'

To manage database with pgadmin, open 'localhost:5050'


# If you are getting error permission denied to file laravel.log, then check this link:

https://docs.docker.com/engine/install/linux-postinstall/
