setup:
	cd docker && docker-compose build && docker-compose up -d
	cd docker && docker-compose exec -u www-data es_php_fpm sh -c "mkdir /var/www/storage/cache"

start:
	cd docker && docker-compose up -d

stop:
	cd docker && docker-compose stop
