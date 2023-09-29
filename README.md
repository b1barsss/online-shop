# docker-laravel
Basic Laravel application on docker!

1. Start docker containers:
```bash
docker compose up -d nginx
```

2. To use your any composer commands:
```bash
docker compose run --rm composer {your composer command}
```

3. To use your any artisan commands:
```bash
docker compose run --rm artisan {your composer command}
```

# If you are getting error permission denied to file laravel.log, then check this link:

https://docs.docker.com/engine/install/linux-postinstall/
