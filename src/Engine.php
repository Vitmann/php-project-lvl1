<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const STEPS = 3; //количество повторений игры

function askNameAndSayWelcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function printCorrectMessage(): void
{
    line('Correct!');
}

function printWrongAnswerMessage(mixed $userAnswer, mixed $correctAnswer, string $name): void
{
    line("{$userAnswer}  is wrong answer ;(. Correct answer was  {$correctAnswer}");
    line("Let's try again, {$name}!");
}

function printCongratulations(string $name): void
{
    line("Congratulations, {$name}!");
}

function askQuestionAndEnterAnswer(string $title, string $question): mixed
{
    line($title);
    line($question);
    return prompt('Your answer ');
}

function checkResult(mixed $result, mixed $userAnswer, string $name): bool
{
    if ($result === $userAnswer) {
        printCorrectMessage();
        return true;
    } else {
        printWrongAnswerMessage($userAnswer, $result, $name);
        return false;
    }
}
