
#!/bin/bash

echo -e "\n### Install AppTCO Project ###"
cd laradock/

echo -e "\n#Docker: Start (Nginx/MySQL/PHPMyAdmin)"
sudo docker-compose up -d nginx mysql phpmyadmin

echo -e "\n#Docker: Create database..."
sudo docker-compose exec mysql sh -c "mysql -u root -proot <<-EOF
    DROP DATABASE IF EXISTS app_tco;
    CREATE DATABASE app_tco;
    GRANT ALL PRIVILEGES ON *.* TO 'root'@'127.0.0.1' WITH GRANT OPTION;
EOF"

echo -e "\n#Laravel: Clear config cache..."
sudo docker-compose exec workspace sh -c "cd tco && php artisan config:cache"

echo -e "\n#Laravel: Clear cache..."
sudo docker-compose exec workspace sh -c "cd tco && php artisan cache:clear"

echo -e "\n#Laravel: Generate key..."
sudo docker-compose exec workspace sh -c "cd tco && php artisan key:generate"

echo -e "\n#Laravel: Clear database..."
sudo docker-compose exec workspace sh -c "cd tco && php artisan migrate:refresh"

echo -e "\n#Laravel: Make migrations..."
sudo docker-compose exec workspace sh -c "cd tco && php artisan migrate"

echo -e  "\n#Laravel: Make seeds..."
sudo docker-compose exec workspace sh -c "cd tco && php artisan db:seed"

echo -e "\n#Docker: Information of new containers..."
sudo docker ps -a 

echo -e "\n#PHPUnit: Execute feature and unit tests..."
sudo docker-compose exec workspace sh -c "cd tco && ./vendor/phpunit/phpunit/phpunit --debug"

echo -e "##\n# Install Complete !!!"