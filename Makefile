install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-progression:
	./bin/brain-progression

brain-gcd:
	./bin/brain-gcd

brain-calc:
	./bin/brain-calc

brain-prime:
	./bin/brain-prime

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
