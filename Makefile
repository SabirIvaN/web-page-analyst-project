test:
		vendor/phpunit/phpunit/phpunit
install:
		composer install
run:
		php -S localhost:8000 -t public
logs:
		tail -f storage/logs/lumen.log
lint:
		phpcs --standard=PSR2 app
