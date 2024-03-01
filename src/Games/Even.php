<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\askQuestionAndEnterAnswer;
use function BrainGames\Engine\checkResult;
use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\askNameAndSayWelcome;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;

//Игра: "Проверка на чётность"
function runGameEven(): void
{
    $name = askNameAndSayWelcome();

    for ($a = 0; $a < ROUNDS_COUNT; ++$a) {
        $number = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $userAnswer = askQuestionAndEnterAnswer(
            'Answer "yes" if the number is even, otherwise answer "no".',
            "Question: {$number}"
        );

        $result = isEven($number);
        var_dump($result);

        if (checkResult($result, $userAnswer, $name) === false) {
            return;
        }
    }

    printCongratulations($name);
}

function isEven(int $number): string
{
    return ($number % 2 === 0) ? 'yes' : 'no';
}
