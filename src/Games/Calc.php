<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;

//Игра: "Калькулятор"
function runGameCalc(): void
{
    $task = [];
    for ($i = 0; $i < ROUNDS_COUNT; ++$i) {
        $randomNum1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNum2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];

        $task[] = [
            'questionText' => 'What is the result of the expression?',
            'question' => "{$randomNum1} {$operation} {$randomNum2}",
            'answer' => calculateResult($operation, $randomNum1, $randomNum2)
        ];
    }

    play($task);
}

function calculateResult(string $operation, int $num1, int $num2)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            break;
    }
}
