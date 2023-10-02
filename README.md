# online-shop

Simple project, some CRUD bases

## To start the project, run these commands step by step

Start docker containers:
```bash
docker compose up -d nginx
```

Set up laravel .env file:
```bash
sudo cp /src/.env.example /src/.env
```

Migrate table:
```bash
docker compose run --rm artisan migrate
```

Seed catalog_user_roles table:
```bash
docker compose run --rm artisan db:seed --class=SeedCatalogUserRolesTable
```

Seed catalog_order_stasuses table:
```bash
docker compose run --rm artisan db:seed --class=SeedCatalogOrderStatusesTable
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

To manage database, open 'localhost:5050'


# If you are getting error permission denied to file laravel.log, then check this link:

https://docs.docker.com/engine/install/linux-postinstall/
