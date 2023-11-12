install:
	composer install
in:
	docker exec -it php-fpm /bin/bash

rebuild:
	docker-compose down
	docker-compose build
	docker-compose up -d
