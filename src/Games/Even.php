<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;

//Игра: "Проверка на чётность"
function runGameEven(): void
{
    $task = [];
    for ($a = 0; $a < ROUNDS_COUNT; ++$a) {
        $task[] = [
            'questionText' => 'Answer "yes" if the number is even, otherwise answer "no".',
            'question' => rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER),
            'answer' => null
        ];

        $task[$a]['answer'] = isEven($task[$a]['question']) ? 'yes' : 'no';
    }
    play($task);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
