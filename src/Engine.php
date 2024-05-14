<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\runCli;
use function cli\line;
use function cli\prompt;
use function PHPUnit\Framework\stringContains;

const ROUNDS_COUNT = 3; //количество раундов в играх

function printWrongAnswerMessage(string $userAnswer, string $correctAnswer, string $name): void
{
    line("{$userAnswer}  is wrong answer ;(. Correct answer was {$correctAnswer}");
    line("Let's try again, {$name}!");
}

function askQuestionAndEnterAnswer(string $question): string
{
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

function play(array $array, string $rules): void
{
    $name = runCli();
    line($rules);

    for ($i = 0; $i < count($array); ++$i) {
        $answer = askQuestionAndEnterAnswer(
            "Question: {$array[$i]['question']} "
        );

        if (checkResult($array[$i]['answer'], $answer, $name) === false) {
            return;
        }
    }
    line("Congratulations, {$name}!");
}
