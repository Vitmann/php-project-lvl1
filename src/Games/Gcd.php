<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\printCorrectMessage;
use function BrainGames\Engine\askNameAndSayWelcome;
use function BrainGames\Engine\printWrongAnswerMessage;
use function cli\line;
use function cli\prompt;

use const BrainGames\Engine\STEPS;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;

//Игра "НОД"
function gcd(): void
{
    $name = askNameAndSayWelcome();

    for ($i = 0; $i < STEPS; ++$i) {
        $randomNumber1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNumber2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $userAnswer = askQuestionAndEnterAnswer($randomNumber1, $randomNumber2);

        if ($userAnswer === getGreatestCommonDivisor($randomNumber1, $randomNumber2)) {
            printCorrectMessage();
        } else {
            printWrongAnswerMessage($userAnswer, getGreatestCommonDivisor($randomNumber1, $randomNumber2), $name);
            return;
        }
    }
    printCongratulations($name);
}

function askQuestionAndEnterAnswer(int $num1, int $num2): int
{
    line('Find the greatest common divisor of given numbers.');
    line("Question: {$num1} {$num2}");
    return (int)prompt('Your answer ');
}

function getGreatestCommonDivisor(int $a, int $b): int
{
    $large = max($a, $b);
    $small = min($a, $b);
    $remainder = $large % $small;
    return 0 === $remainder ? $small : getGreatestCommonDivisor($small, $remainder);
}
