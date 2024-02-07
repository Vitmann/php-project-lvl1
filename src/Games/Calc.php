<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\correct;
use function BrainGames\Engine\wrongAnswerMessage;
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\askNameAndSayWelcome;

//Игра: "Калькулятор"
function calc(): void
{
    $name = askNameAndSayWelcome();
    calkTask();

    for ($i = 0; $i < 3; ++$i) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operations = ['+', '-', '*'];
        $operation = $operations[rand(0, 2)];

        $answer = askUserAnswer($num1, $operation, $num2);

        $result = calculateResult($operation, $num1, $num2);

        if ($result === $answer) {
            correct();
        } else {
            wrongAnswerMessage($answer, $result, $name);
            return;
        }
    }
    congratulations($name);
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
