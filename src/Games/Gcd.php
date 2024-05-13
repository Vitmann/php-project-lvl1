<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;

//Игра "НОД"
function runGameGcd(): void
{
    $task = [];
    for ($i = 0; $i < ROUNDS_COUNT; ++$i) {
        $randomNumber1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNumber2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $task[] = [
            'questionText' => 'Find the greatest common divisor of given numbers.',
            'question' => "{$randomNumber1} {$randomNumber2}",
            'answer' => (string)getGreatestCommonDivisor($randomNumber1, $randomNumber2)
        ];
    }

    play($task);
}

function getGreatestCommonDivisor(int $a, int $b): int
{
    $large = max($a, $b);
    $small = min($a, $b);
    $remainder = $large % $small;
    return 0 === $remainder ? $small : getGreatestCommonDivisor($small, $remainder);
}
