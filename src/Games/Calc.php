<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\askQuestionAndEnterAnswer;
use function BrainGames\Engine\checkResult;
use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\askNameAndSayWelcome;

use const BrainGames\Engine\ROUNDS_COUNT;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;

//Игра: "Калькулятор"
function runGameCalc(): void
{
    $name = askNameAndSayWelcome();

    for ($i = 0; $i < ROUNDS_COUNT; ++$i) {
        $randomNum1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNum2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];

        $answer  = (int) askQuestionAndEnterAnswer(
            'What is the result of the expression?',
            "Question: {$randomNum1} {$operation} {$randomNum2}"
        );

        $result = calculateResult($operation, $randomNum1, $randomNum2);

        if (checkResult($result, $answer, $name) === false) {
            return;
        }
    }
    printCongratulations($name);
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
    return false;
}
