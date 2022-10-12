<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;

function Gcd()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < 3; ++$i) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        line('Question:' . $num1 . ' ' . $num2 );
        $answer = prompt('Your answer: ');

        if ($answer == gmp_gcd($num1, $num2)) {
            line('Correct!');
        } else {
            line($answer . ' is wrong answer ;(. Correct answer was ' . gmp_gcd($num1, $num2));
            line("Let's try again, " . $name);
            break;
        }
    }
}
