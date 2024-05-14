<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 20;

//Игра "Простое ли число?"
function runGamePrime(): void
{
    $task = [];
    for ($a = 0; $a < ROUNDS_COUNT; ++$a) {
        $task[] = [
            'question' => rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER),
            'answer' => null
        ];

        $task[$a]['answer'] = isPrimeNumber($task[$a]['question']) ? 'yes' : 'no';
    }
    play($task, 'Answer "yes" if given number is prime. Otherwise answer "no".');
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
