start:
	php artisan serve --host 0.0.0.0

setup:
	npm install
	composer install
	cp -n .env.example .env || true
	php artisan key:gen --ansi
	npm run dev

db-prepare:
	php artisan migrate --seed

db-refresh:
	php artisan migrate:refresh --seed

clear:
	php artisan route:clear
	php artisan config:clear
	php artisan cache:clear
	php artisan debugbar:clear

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

lint:
	composer phpcs

lint-fix:
	composer phpcbf

deploy:
	git push heroku

compose:
	docker-compose up

compose-test:
	docker-compose run web make test

compose-bash:
	docker-compose run web bash

compose-setup: compose-build
	docker-compose run web make setup

compose-build:
	docker-compose build

compose-migrate:
	docker-compose run web make db-prepare

compose-refresh:
	docker-compose run web make db-refresh

compose-db:
	docker-compose exec db mysql -uroot -p

compose-down:
	docker-compose down -v