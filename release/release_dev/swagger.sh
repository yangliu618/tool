#!/bin/bash


cd /var/www/html/theone/theone;

/var/www/html/theone/theone/vendor/zircote/swagger-php/bin/swagger /var/www/html/theone/theone/backend/ -o /var/www/html/theone/swagger-ui/dist/data/backend.json
/var/www/html/theone/theone/vendor/zircote/swagger-php/bin/swagger -e /var/www/html/theone/theone/frontend/controllers/SportController.php /var/www/html/theone/theone/frontend/ -o /var/www/html/theone/swagger-ui/dist/data/frontend.json
/var/www/html/theone/theone/vendor/zircote/swagger-php/bin/swagger /var/www/html/theone/theone/frontend/controllers/SportController.php -o /var/www/html/theone/swagger-ui/dist/data/sport.json
