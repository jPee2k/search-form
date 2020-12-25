start:
	php artisan serve --host 0.0.0.0

setup:
	composer install
	cp -n .env.example .env || true
	php artisan key:gen --ansi
	touch ./database/database.sqlite
	db-fresh

db-fresh:
	php artisan migrate:fresh --seed

log:
	tail -f storage/logs/laravel.log
