<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\printCorrectMessage;
use function BrainGames\Engine\askNameAndSayWelcome;
use function BrainGames\Engine\printWrongAnswerMessage;
use function cli\line;
use function cli\prompt;

use const BrainGames\Engine\STEPS;

//Игра "Простое ли число?"

function prime(): void
{
    $name = askNameAndSayWelcome();
    $arrNumber = [2, 3, 5, 7, 11, 13, 17, 19, 23, 1, 4, 6, 8];

    for ($a = 0; $a < STEPS; ++$a) {
        $number = $arrNumber[array_rand($arrNumber)];
        $answer = askQuestionAndEnterAnswer($number);

        if ($answer === checkIfPrime($number)) {
            printCorrectMessage();
        } else {
            printWrongAnswerMessage($answer, checkIfPrime($number), $name);
            return;
        }
    }
    printCongratulations($name);
}

function askQuestionAndEnterAnswer(int $number): string
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    line('Question: ' . $number);
    return prompt('Your answer');
}

function checkIfPrime(int $number): string
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
