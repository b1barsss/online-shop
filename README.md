# online-shop

Simple project, some CRUD bases

## To configure the project

Open '/online-shop' folder:
```bash
cd path/to/the/folder/online-shop
```

Run this command and wait:
```bash
bash scripts/start.sh
```

Then open 'localhost' on your browser. 
----------------------------------

(Optional) To use your any composer commands:
```sh
docker compose run --rm composer {your composer command}
```

(Optional) To use your any artisan commands:
```bash
docker compose run --rm artisan {your artisan command}
```

To manage database with pgadmin, open 'localhost:5050'

# If you are getting error permission denied to file laravel.log, then check this link:

https://docs.docker.com/engine/install/linux-postinstall/
