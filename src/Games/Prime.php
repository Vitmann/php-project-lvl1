<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\askQuestionAndEnterAnswer;
use function BrainGames\Engine\checkResult;
use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\askNameAndSayWelcome;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 20;

//Игра "Простое ли число?"
function runGamePrime(): void
{
    $name = askNameAndSayWelcome();

    for ($a = 0; $a < ROUNDS_COUNT; ++$a) {
        $number = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $userAnswer = askQuestionAndEnterAnswer(
            'Answer "yes" if given number is prime. Otherwise answer "no".',
            'Question: ' . $number
        );

        if (checkResult(isPrimeNumber($number) ? 'yes' : 'no', $userAnswer, $name) === false) {
            return;
        }
    }
    printCongratulations($name);
}

function isPrimeNumber(int $number): bool
{
    if ($number === 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
