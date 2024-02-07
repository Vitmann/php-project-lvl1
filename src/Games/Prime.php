<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\correct;
use function BrainGames\Engine\askNameAndSayWelcome;
use function BrainGames\Engine\wrongAnswerMessage;
use function cli\line;
use function cli\prompt;

//Игра "Простое ли число?"

function Prime(): void
{
    $name = askNameAndSayWelcome();
    $arrNumber = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 1, 4, 6, 8);

    for ($a = 0; $a < 3; ++$a) {
        $number = $arrNumber[array_rand($arrNumber, 1)];
        $answer = askQuestionAndEnterAnswer($number);

        if ($answer === primeCheck($number)) {
            correct();
        } else {
            wrongAnswerMessage($answer, primeCheck($number), $name);
            return;
        }
    }
    congratulations($name);
}

function askQuestionAndEnterAnswer(int $number): string
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    line('Question: ' . $number);
    return prompt('Your answer');
}

function primeCheck(int $number): string
{
    if ($number === 1) {
        return 'no';
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}
