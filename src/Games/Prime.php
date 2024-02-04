<?php

namespace BrainGames\Games;

use function BrainGames\Welcome\Congratulations;
use function BrainGames\Welcome\Correct;
use function BrainGames\Welcome\Welcome;
use function BrainGames\Welcome\WrongAnswerMessage;
use function cli\line;
use function cli\prompt;

//Игра "Простое ли число?"
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
    $name = Welcome();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $arrNumber = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 1, 4, 6, 8);

    for ($a = 0; $a < 3; ++$a) {
        $number = $arrNumber[array_rand($arrNumber, 1)];

        line('Question: '.$number);
        $answer = prompt('Your answer');

        if ($answer == primeCheck($number)) {
            Correct();
        } else {
            WrongAnswerMessage($answer, primeCheck($number), $name);
            return;
        }
    }
    Congratulations($name);
}
