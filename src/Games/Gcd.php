<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;

function get_greatest_common_divisor(int $a, int $b): int
{
    $large = $a > $b ? $a : $b;
    $small = $a > $b ? $b : $a;
    $remainder = $large % $small;
    return 0 == $remainder ? $small : get_greatest_common_divisor($small, $remainder);
}

function Gcd()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < 3; ++$i) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        line('Question: ' . $num1 . ' ' . $num2);
        $answer = prompt('Your answer ');

        if ($answer == get_greatest_common_divisor($num1, $num2)) {
            line('Correct!');
        } else {
            line($answer . ' is wrong answer ;(. Correct answer was ' . get_greatest_common_divisor($num1, $num2));
            line("Let's try again, " . $name . '!');
            return;
        }
    }
    line('Congratulations, ' . $name . '!');
}
