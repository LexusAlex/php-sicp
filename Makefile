init:
	docker build --tag lexusalex/php-sicp .
	docker run --name php-sicp -p 80:80 -d -v $(PWD):/var/www/localhost/htdocs lexusalex/php-sicp

start:
	docker start php-sicp

stop:
	docker stop php-sicp

restart:
	docker restart php-sicp

composer:
	docker exec -i php-sicp /bin/bash -c "composer update"

linter:
	docker exec -i php-sicp /bin/bash -c "vendor/bin/phpcs -- --standard=PSR12 src"

phpunit:
	docker exec -it php-sicp /bin/bash -c "vendor/bin/phpunit"
