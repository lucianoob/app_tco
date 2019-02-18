
#!/bin/bash
COLOR='\033[1;34m'
NC='\033[0m'

echo -e "${COLOR}"
echo -e "##############################"
echo -e "### Install AppTCO Project ###"
echo -e "##############################"
echo -e "${NC}"

cd laradock/

echo -e "\n#Docker: Start (Nginx/MySQL/PHPMyAdmin)"
sudo docker-compose up -d nginx mysql phpmyadmin

echo -e "\n#Docker: Create database..."
sudo docker-compose exec mysql sh -c "mysql -u root -proot <<-EOF
    DROP DATABASE IF EXISTS app_tco;
    CREATE DATABASE app_tco;
    GRANT ALL PRIVILEGES ON *.* TO 'root'@'127.0.0.1' WITH GRANT OPTION;
EOF"

echo -e "\n#Laravel: Clear config cache... (App)"
sudo docker-compose exec workspace sh -c "cd tco && php artisan config:cache"

echo -e "\n#Laravel: Clear config cache... (API)"
sudo docker-compose exec workspace sh -c "cd api && php artisan config:cache"

echo -e "\n#Laravel: Clear cache... (App)"
sudo docker-compose exec workspace sh -c "cd tco && php artisan cache:clear"

echo -e "\n#Laravel: Clear cache... (API)"
sudo docker-compose exec workspace sh -c "cd api && php artisan cache:clear"

echo -e "\n#Laravel: Generate key... (App)"
sudo docker-compose exec workspace sh -c "cd tco && php artisan key:generate"

echo -e "\n#Laravel: Generate key... (API)"
sudo docker-compose exec workspace sh -c "cd api && php artisan key:generate"

echo -e "\n#Laravel: Make migrations... (App)"
sudo docker-compose exec workspace sh -c "cd tco && php artisan migrate"

echo -e "\n#Laravel: Make migrations... (API)"
sudo docker-compose exec workspace sh -c "cd api && php artisan migrate"

echo -e  "\n#Laravel: Make seeds... (App)"
sudo docker-compose exec workspace sh -c "cd tco && php artisan db:seed"

echo -e  "\n#Laravel: Make seeds... (API)"
sudo docker-compose exec workspace sh -c "cd api && php artisan db:seed"

echo -e "\n#Docker: Information of new containers..."
sudo docker ps -a 

echo -e "\n#PHPUnit: Execute feature and unit tests... (App)"
#sudo docker-compose exec workspace sh -c "cd tco && ./vendor/phpunit/phpunit/phpunit --debug"

echo -e "\n#PHPUnit: Execute feature and unit tests... (API)"
#sudo docker-compose exec workspace sh -c "cd api && ./vendor/phpunit/phpunit/phpunit --debug"

echo -e "${COLOR}"
echo -e "##############################"
echo -e "#### Install Complete !!! ####"
echo -e "##############################"
echo -e "${NC}"
