<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function askNameAndSayWelcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function correct(): void
{
    line('Correct!');
}

function wrongAnswerMessage(mixed $userAnswer, mixed $correctAnswer, string $name): void
{
    line("{$userAnswer}  is wrong answer ;(. Correct answer was  {$correctAnswer}");
    line("Let's try again, {$name}!");
}

function congratulations(string $name): void
{
    line("Congratulations, {$name}!");
}
