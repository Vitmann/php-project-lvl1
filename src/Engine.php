<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\runCli;
use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3; //количество раундов в играх

function printWrongAnswerMessage(string $userAnswer, string $correctAnswer, string $name): void
{
    line("{$userAnswer}  is wrong answer ;(. Correct answer was {$correctAnswer}");
    line("Let's try again, {$name}!");
}

function askQuestionAndEnterAnswer(string $questionText, string $question): string
{
    line($questionText);
    line($question);
    return prompt('Your answer ');
}

function checkResult(string $result, string $userAnswer, string $name): bool
{
    if ($result === $userAnswer) {
        line('Correct!');
        return true;
    } else {
        printWrongAnswerMessage($userAnswer, $result, $name);
        return false;
    }
}

function play($array): void
{
    $name = runCli();

    for ($i = 0; $i < count($array); ++$i) {
        $answer = askQuestionAndEnterAnswer(
            "{$array[$i]['questionText']}",
            "Question: {$array[$i]['question']} "
        );

        if (checkResult($array[$i]['answer'], $answer, $name) === false) {
            return;
        }
    }
    line("Congratulations, {$name}!");
}
