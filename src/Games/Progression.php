<?php

namespace BrainGames\Games\Progressive;

use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\printCorrectMessage;
use function BrainGames\Engine\askNameAndSayWelcome;
use function BrainGames\Engine\printWrongAnswerMessage;
use function cli\line;
use function cli\prompt;

use const BrainGames\Engine\STEPS;

const RANGE_START = 2; //старт генерации строки чисел
const RANGE_END = 22; //предел генерации строки чисел
const MIN_STEP = 2; //минимальный шаг генерации строки чисел
const MAX_STEP = 4; //максимальный шаг генерации строки чисел
//Игра "Арифметическая прогрессия"
function progressive(): void
{
    $name = askNameAndSayWelcome();
    for ($a = 0; $a < STEPS; ++$a) {
        $generateString = range(RANGE_START, RANGE_END, rand(MIN_STEP, MAX_STEP));
        $indexHideValue = array_rand($generateString);
        $workString = [];
        $realAnswer = 0;

        list($realAnswer, $workString) = replaceRandomNum($generateString, $indexHideValue, $realAnswer, $workString);

        $userAnswer = askQuestionAndEnterAnswer($workString);

        if ($userAnswer === $realAnswer) {
            printCorrectMessage();
        } else {
            printWrongAnswerMessage($userAnswer, $realAnswer, $name);
            return;
        }
    }
    printCongratulations($name);
}

function askQuestionAndEnterAnswer(mixed $workString): int
{
    line('What number is missing in the progression?');
    line('Question: ' . implode(" ", $workString));
    return prompt('Your answer ');
}

function replaceRandomNum(array $string, int $indexHideValue, int $realAnswer, array $workString): array
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
