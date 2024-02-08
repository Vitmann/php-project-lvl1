<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\askQuestionAndEnterAnswer;
use function BrainGames\Engine\checkResult;
use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\askNameAndSayWelcome;

use const BrainGames\Engine\STEPS;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;
//Игра: "Калькулятор"
function calc(): void
{
    $name = askNameAndSayWelcome();

    for ($i = 0; $i < STEPS; ++$i) {
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

function calculateResult(string $operation, int $num1, int $num2): int
{
    $result = 0;
    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }
    return $result;
}
