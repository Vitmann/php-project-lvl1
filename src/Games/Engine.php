<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function Calc()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');

    for ($i = 0; $i < 3; ++$i) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operations = ['+', '-', '*'];
        $operation = $operations[rand(0, 2)];

        line('Question: ' . $num1 . ' ' . $operation . ' ' . $num2);
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
            line('Correct!');
        } else {
            line($answer . ' is wrong answer ;(. Correct answer was ' . $result);
            line("Let's try again, " . $name);
            break;
        }
    }
    line('Congratulations, ' . $name . '!');
}
