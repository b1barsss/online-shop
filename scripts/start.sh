sudo cp -r src/.env.example src/.env;
docker compose up -d nginx;
docker compose run --rm composer install;
docker compose run --rm artisan key:generate;
docker compose run --rm artisan migrate;
docker compose run --rm artisan db:seed;
sudo chmod 777 -R src/;