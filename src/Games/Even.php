<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;

//Игра: "Проверка на чётность"
function runGameEven(): void
{
    $taskEven = [];
    for ($index = 0; $index < ROUNDS_COUNT; ++$index) {
        $question = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $taskEven[] = [
            'question' => $question,
            'answer' => isEven($question) ? 'yes' : 'no'
        ];
    }
    play($taskEven, 'Answer "yes" if the number is even, otherwise answer "no".');
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
