up:
	@docker-compose up --build -d

stop:
	@docker-compose stop

phpunit:
	@docker exec phpunit-notes-php ./vendor/phpunit/phpunit/phpunit