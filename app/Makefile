firstUp:
	cp .env.example .env
	composer install --ignore-platform-reqs
	php artisan key:generate
	php artisan migrate
	chown -R 1000:1000 ./
	chmod -R 777 storage
