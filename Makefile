install:
	composer install

brain-games:
	./bin/brain-games #просто приветствие

brain-even:
	./bin/brain-even #Игра проверка на четность

brain-progression:
	./bin/brain-progression

brain-gcd:
	./bin/brain-gcd # Игра НОД наибольший общий делитель

brain-calc:
	./bin/brain-calc

brain-prime:
	./bin/brain-prime

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
