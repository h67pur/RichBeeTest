start:
	docker-compose down -v
	docker-compose up -d --build
	docker exec -it backend ip link
	docker exec -it backend make firstUp

down:
	docker-compose down

up:
	docker-compose up -d

migrate:
	docker exec backend php artisan migrate