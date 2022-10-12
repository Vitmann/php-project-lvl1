install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-gcd:
	./bin/brain-gcd

brain-calc:
	./bin/brain-calc

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
