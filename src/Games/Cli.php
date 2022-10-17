<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function Cli()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $number = [4, 6, 7];

    foreach ($number as $num) {
        line('Question: ' . $num);
        $answer = prompt('Enter your answer');
        if ($num % 2 === 0) {
            $even = 'yes';
        } else {
            $even = 'no';
        }

        if ($even === $answer) {
            line('Correct!');
        } else {
            line($answer .  ' is wrong answer ;(. Correct answer was ' . $even);
            return;
        }
    }
    line('Congratulations, ' . $name . '!');
}
