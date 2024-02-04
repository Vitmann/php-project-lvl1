<?php

namespace BrainGames\Games;

use function BrainGames\Welcome\Congratulations;
use function BrainGames\Welcome\Correct;
use function BrainGames\Welcome\WrongAnswerMessage;
use function cli\line;
use function cli\prompt;
use function BrainGames\Welcome\Welcome;

//Игра: "Калькулятор"
function Calc(): void
{
    $name = Welcome();
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; ++$i) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operations = ['+', '-', '*'];
        $operation = $operations[rand(0, 2)];

        line("Question: {$num1} {$operation} {$num2}");
        $answer = prompt('Your answer');
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

        if ($result == $answer) {
            Correct();
        } else {
            WrongAnswerMessage($answer, $result, $name);
            return;
        }
    }
    Congratulations($name);
}
