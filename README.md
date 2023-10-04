# online-shop

Simple project, some CRUD bases

## To start the project

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
<img width="593" alt="image" src="https://github.com/b1barsss/online-shop/assets/47029176/191da11d-08c4-4418-8c4c-b6637f9109c4">

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
