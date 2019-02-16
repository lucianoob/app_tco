
#!/bin/bash

echo -e "\n### Stop AppTCO Project ###"
cd laradock/

echo -e "\n#Docker: Stop (Nginx/MySQL/PHPMyAdmin)"
sudo docker-compose down

echo -e "##\n# Stop Complete !!!"