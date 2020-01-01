install:
		composer install
test:
		composer run-script phpunit tests
lint:
		phpcs --standard=PSR2 app
run:
		php -S localhost:8000 -t public
logs:
		tail -f storage/logs/lumen.log

