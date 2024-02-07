<?php

namespace BrainGames\Games\Progressive;

use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\correct;
use function BrainGames\Engine\askNameAndSayWelcome;
use function BrainGames\Engine\wrongAnswerMessage;
use function cli\line;
use function cli\prompt;

//Игра "Арифметическая прогрессия"
function Progressive(): void
{
    $name = askNameAndSayWelcome();
    for ($a = 0; $a < 3; ++$a) {
        $generateString = range(2, 22, rand(2, 4));
        $indexHideValue = array_rand($generateString, 1);
        $workString = [];
        $realAnswer = 0;

        list($realAnswer, $workString) = ReplaceRandomNum($generateString, $indexHideValue, $realAnswer, $workString);

        $userAnswer = askQuestionAndEnterAnswer($workString);

        if ($userAnswer === $realAnswer) {
            correct();
        } else {
            wrongAnswerMessage($userAnswer, $realAnswer, $name);
            return;
        }
    }
    congratulations($name);
}

function askQuestionAndEnterAnswer(mixed $workString): int
{
    line('What number is missing in the progression?');
    line('Question: ' . implode(" ", $workString));
    return prompt('Your answer ');
}

function ReplaceRandomNum(array $string, int $indexHideValue, int $realAnswer, array $workString): array
{
    foreach ($string as $value) {
        if ($value === $string[$indexHideValue]) {
            $realAnswer = $value;
            $value = '..';
        }
        $workString[] = (string) $value;
    }
    return array($realAnswer, $workString);
}
