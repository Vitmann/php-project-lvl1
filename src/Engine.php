<?php

namespace BrainGames\Welcome;

use function cli\line;
use function cli\prompt;

function Welcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function Correct(): void
{
    line('Correct!');
}

function WrongAnswerMessage($userAnswer, $correctAnswer, $name)
{
    line("{$userAnswer}  is wrong answer ;(. Correct answer was  {$correctAnswer}");
    line("Let's try again, {$name}!");
}

function Congratulations($name)
{
    line("Congratulations, {$name}!");
}
