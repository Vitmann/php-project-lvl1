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

function checkResult(string $result, string $userAnswer, string $name): bool
{
    if ($result === $userAnswer) {
        line('Correct!');
        return true;
    }

    printWrongAnswerMessage($userAnswer, $result, $name);
    return false;
}

function play(array $array, string $rules): void
{
    $name = runCli();
    line($rules);

    $count = count($array);

    for ($i = 0; $i < $count; ++$i) {
        line("Question: {$array[$i]['question']} ");
        $answer = prompt('Your answer ');

        if (checkResult($array[$i]['answer'], $answer, $name) === false) {
            return;
        }
    }
    line("Congratulations, {$name}!");
}
