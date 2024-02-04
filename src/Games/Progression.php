<?php

namespace BrainGames\Games;

use function BrainGames\Welcome\Correct;
use function BrainGames\Welcome\Welcome;
use function BrainGames\Welcome\WrongAnswerMessage;
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
            $workString[] = (string) $value;
        }
        line('What number is missing in the progression?');
        line('Question: '.implode(" ", $workString));
        $userAnswer = prompt('Your answer ');
        if ($userAnswer == $realAnswer) {
            Correct();
        } else {
            WrongAnswerMessage($userAnswer, $realAnswer, $name);
            return;
        }
    }
    line("Congratulations, {$name}!");
}
