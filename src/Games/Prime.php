<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\askQuestionAndEnterAnswer;
use function BrainGames\Engine\checkResult;
use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\askNameAndSayWelcome;

use const BrainGames\Engine\STEPS;

//Игра "Простое ли число?"

function prime(): void
{
    $name = askNameAndSayWelcome();
    $arrNumber = [2, 3, 5, 7, 11, 13, 17, 19, 23, 1, 4, 6, 8];

    for ($a = 0; $a < STEPS; ++$a) {
        $number = $arrNumber[array_rand($arrNumber)];
        $answer = askQuestionAndEnterAnswer(
            'Answer "yes" if given number is prime. Otherwise answer "no".',
            'Question: ' . $number
        );

        if (checkResult(checkIfPrime($number), $answer, $name) === false) {
            return;
        }
    }
    printCongratulations($name);
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
