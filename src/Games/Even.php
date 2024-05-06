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
    $task = [];
    for ($a = 0; $a < ROUNDS_COUNT; ++$a) {
        $task[] = [
            'number' => rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER),
            'result' => null
        ];

        $task[$a]['result'] = isEven($task[$a]['number']) ? 'yes' : 'no';
    }

    $name = askNameAndSayWelcome();

    for ($a = 0; $a < count($task); ++$a) {
        $userAnswer = askQuestionAndEnterAnswer(
            'Answer "yes" if the number is even, otherwise answer "no".',
            "Question: {$task[$a]['number']}"
        );

        if (checkResult($task[$a]['result'], $userAnswer, $name) === false) {
            return;
        }
    }

    printCongratulations($name);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
