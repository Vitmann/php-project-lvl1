<?php

namespace BrainGames\Progressive;

use function BrainGames\Welcome\Welcome;
use function cli\line;
use function cli\prompt;

//Игра "Арифметическая прогрессия"
function Progressive()
{
    $name = Welcome();

    for ($a = 0; $a < 3; ++$a) {
        $string = range(2, 22, rand(2, 4));
        $indexHideValue = array_rand($string, 1);

        $workString = [];
        $realAnswer = 0;

        foreach ($string as $value) {
            if ($value == $string[$indexHideValue]) {
                $realAnswer = $value;
                $value = '..';
            }
            $workString[] = (string)$value;
        }

        line('What number is missing in the progression?');
        line('Question: ' . implode(" ", $workString));
        $userAnswer = prompt('Your answer ');

        if ($userAnswer == $realAnswer) {
            line('Correct!');
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$realAnswer}");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
