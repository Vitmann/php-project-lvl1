<?php

namespace BrainGames\Games;

use function BrainGames\Welcome\Congratulations;
use function BrainGames\Welcome\Correct;
use function BrainGames\Welcome\WrongAnswerMessage;
use function cli\line;
use function cli\prompt;
use function BrainGames\Welcome\WelcomeAndAskName;

//Игра: "Калькулятор"
function Calc(): void
{
    $name = WelcomeAndAskName();
    CalkTask();

    for ($i = 0; $i < 3; ++$i) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operations = ['+', '-', '*'];
        $operation = $operations[rand(0, 2)];

        $answer = AskUserAnswer($num1, $operation, $num2);

        $result = CalculateResult($operation, $num1, $num2);

        if ($result == $answer) {
            Correct();
        } else {
            WrongAnswerMessage($answer, $result, $name);
            return;
        }
    }
    Congratulations($name);
}

/**
 * @param  string  $operation
 * @param  int  $num1
 * @param  int  $num2
 * @return float|int
 */
function CalculateResult(string $operation, int $num1, int $num2): int
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

function CalkTask(): void
{
    line('What is the result of the expression?');
}

function AskUserAnswer(int $num1, string $operation, int $num2): string
{
    line("Question: {$num1} {$operation} {$num2}");
    return prompt('Your answer');
}
