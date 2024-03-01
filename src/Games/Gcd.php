<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\askQuestionAndEnterAnswer;
use function BrainGames\Engine\checkResult;
use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\askNameAndSayWelcome;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;

//Игра "НОД"
function runGameGcd(): void
{
    $name = askNameAndSayWelcome();

    for ($i = 0; $i < ROUNDS_COUNT; ++$i) {
        $randomNumber1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNumber2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $userAnswer = (int) askQuestionAndEnterAnswer(
            'Find the greatest common divisor of given numbers.',
            "Question: {$randomNumber1} {$randomNumber2}"
        );

        if (checkResult(getGreatestCommonDivisor($randomNumber1, $randomNumber2), $userAnswer, $name) === false) {
            return;
        }
    }
    printCongratulations($name);
}

function getGreatestCommonDivisor(int $a, int $b): int
{
    $large = max($a, $b);
    $small = min($a, $b);
    $remainder = $large % $small;
    return 0 === $remainder ? $small : getGreatestCommonDivisor($small, $remainder);
}
