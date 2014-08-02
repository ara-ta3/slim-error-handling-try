PHP=$(shell which php)
HOST=localhost
PORT=8080

install:
	curl -s https://getcomposer.org/installer | php
	${PHP} composer.phar install

start:
	${PHP} -S ${HOST}:${PORT} -t public_html
