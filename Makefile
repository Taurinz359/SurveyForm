lint:
	composer exec phpcs -- --standard=PSR12 ./src; \
	composer exec phpcbf -- --standard=PSR12 ./src;
