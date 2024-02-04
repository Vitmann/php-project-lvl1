<?php

namespace BrainGames\Games;

use function BrainGames\Welcome\Correct;
use function BrainGames\Welcome\WelcomeAndAskName;
use function BrainGames\Welcome\WrongAnswerMessage;
use function cli\line;
use function cli\prompt;

function get_greatest_common_divisor(int $a, int $b): int
{
    $large = $a > $b ? $a : $b;
    $small = $a > $b ? $b : $a;
    $remainder = $large % $small;
    return 0 == $remainder ? $small : get_greatest_common_divisor($small, $remainder);
}

//Игра "НОД"
function Gcd(): void
{
    $name = WelcomeAndAskName();
    line('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < 3; ++$i) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        line("Question: {$num1} {$num2}");
        $answer = prompt('Your answer ');

        if ($answer == get_greatest_common_divisor($num1, $num2)) {
            Correct();
        } else {
            WrongAnswerMessage($answer, get_greatest_common_divisor($num1, $num2), $name);
            return;
        }
    }
    line("Congratulations, {$name}!");
}
