<?php

namespace BrainGames\Games;

use function BrainGames\Welcome\Congratulations;
use function BrainGames\Welcome\Correct;
use function BrainGames\Welcome\Welcome;
use function BrainGames\Welcome\WrongAnswerMessage;
use function cli\line;
use function cli\prompt;

//Игра: "Проверка на чётность"
function Even(): void
{
    $name = Welcome();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $number = [4, 6, 7];

    foreach ($number as $num) {
        line("Question: {$num}");
        $answer = prompt('Enter your answer');

        $even = ($num % 2 === 0) ? 'yes' : 'no';

        if ($even === $answer) {
            Correct();
        } else {
            WrongAnswerMessage($answer, $even, $name);
            return;
        }
    }
    Congratulations($name);
}
