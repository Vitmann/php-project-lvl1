<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\runCli;
use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3; //количество раундов в играх

function askNameAndSayWelcome(): string
{
    return runCli();
}

function printCorrectMessage(): void
{
    line('Correct!');
}

function printWrongAnswerMessage(string $userAnswer, string $correctAnswer, string $name): void
{
    line("{$userAnswer}  is wrong answer ;(. Correct answer was {$correctAnswer}");
    line("Let's try again, {$name}!");
}

function printCongratulations(string $name): void
{
    line("Congratulations, {$name}!");
}

function askQuestionAndEnterAnswer(string $title, string $question): string
{
    line($title);
    line($question);
    return prompt('Your answer ');
}

function checkResult(string $result, string $userAnswer, string $name): bool
{
    if ($result === $userAnswer) {
        printCorrectMessage();
        return true;
    } else {
        printWrongAnswerMessage($userAnswer, $result, $name);
        return false;
    }
}
