<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\printCorrectMessage;
use function BrainGames\Engine\printWrongAnswerMessage;
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\askNameAndSayWelcome;

use const BrainGames\Engine\STEPS;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 10;
//Игра: "Калькулятор"
function calc(): void
{
    $name = askNameAndSayWelcome();
    calkTask();

    for ($i = 0; $i < STEPS; ++$i) {
        $randomNum1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNum2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];

        $answer = askUserAnswer($randomNum1, $operation, $randomNum2);

        $result = calculateResult($operation, $randomNum1, $randomNum2);

        if ($result === $answer) {
            printCorrectMessage();
        } else {
            printWrongAnswerMessage($answer, $result, $name);
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

function calkTask(): void
{
    line('What is the result of the expression?');
}

function askUserAnswer(int $num1, string $operation, int $num2): int
{
    line("Question: {$num1} {$operation} {$num2}");
    return prompt('Your answer');
}
