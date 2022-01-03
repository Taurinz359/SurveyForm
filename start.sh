#! /bin/bash
sudo chmod 777 storage
sudo apt install composer
sudo apt install docker
sudo apt install docker-compose
sudo apt install php8.1-pgsql
composer install
docker-compose up -d
docker-compose ps
echo "######################"
echo "link: localhost:1234"
echo "######################"
