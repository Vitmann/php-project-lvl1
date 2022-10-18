<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

function primeCheck(int $number): string
{
    if ($number == 1) {
        return 'no';
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}

function Prime(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $arrNumber = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 1, 4, 6, 8);

    for ($a = 0; $a < 3; ++$a) {
        $number = $arrNumber[array_rand($arrNumber, 1)];

        line('Question: ' . $number);
        $answer = prompt('Your answer');

        if ($answer == primeCheck($number)) {
            line('Correct!');
        } else {
            line($answer . ' is wrong answer ;(. Correct answer was ' . primeCheck($number));
            line("Let's try again, " . $name . '!');
            return;
        }
    }
    line('Congratulations, ' . $name . '!');
}
