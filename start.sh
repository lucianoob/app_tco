
#!/bin/bash

echo -e "\n### Start AppTCO Project ###"
cd laradock/

echo -e "\n#Docker: Start (Nginx/MySQL/PHPMyAdmin)"
sudo docker-compose up -d nginx mysql phpmyadmin

echo -e "##\n# Start Complete !!!"