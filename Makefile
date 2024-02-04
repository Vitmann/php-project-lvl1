install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-games:
	./bin/brain-games #просто приветствие

brain-even:
	./bin/brain-even #Игра проверка на четность

brain-progression:
	./bin/brain-progression #Игра "Арифметическая прогрессия"

brain-gcd:
	./bin/brain-gcd #Игра НОД наибольший общий делитель

brain-calc:
	./bin/brain-calc #Калькулятор

brain-prime:
	./bin/brain-prime #Игра "Простое ли число?"


