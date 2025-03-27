include .env
bash-nx:
	docker exec -it nginx_proxy bash
bash-app:
	docker exec -it app bash
bash-db:
	docker exec -it database bash
create-db:
	docker exec -it database mysql -u ${DB_USERNAME} -p${DB_PASSWORD} -e "CREATE DATABASE ${DB_DATABASE};"
up:
	docker compose up -d --no-deps --build
down:
	docker compose down
rs:
	make down
	make up
