<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\correct;
use function BrainGames\Engine\askNameAndSayWelcome;
use function BrainGames\Engine\wrongAnswerMessage;
use function cli\line;
use function cli\prompt;

//Игра "НОД"
function Gcd(): void
{
    $name = askNameAndSayWelcome();

    for ($i = 0; $i < 3; ++$i) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);

        $userAnswer = askQuestionAndEnterAnswer($randomNumber1, $randomNumber2);

        if ($userAnswer === get_greatest_common_divisor($randomNumber1, $randomNumber2)) {
            correct();
        } else {
            wrongAnswerMessage($userAnswer, get_greatest_common_divisor($randomNumber1, $randomNumber2), $name);
            return;
        }
    }
    congratulations($name);
}

function askQuestionAndEnterAnswer(int $num1, int $num2): int
{
    line('Find the greatest common divisor of given numbers.');
    line("Question: {$num1} {$num2}");
    return (int)prompt('Your answer ');
}

function get_greatest_common_divisor(int $a, int $b): int
{
    $large = max($a, $b);
    $small = min($a, $b);
    $remainder = $large % $small;
    return 0 === $remainder ? $small : get_greatest_common_divisor($small, $remainder);
}
