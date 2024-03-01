<?php

namespace BrainGames\Games\Progressive;

use function BrainGames\Engine\askQuestionAndEnterAnswer;
use function BrainGames\Engine\checkResult;
use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\askNameAndSayWelcome;

use const BrainGames\Engine\ROUNDS_COUNT;

const RANGE_START = 2; //старт генерации строки чисел
const RANGE_END = 22; //предел генерации строки чисел
const MIN_STEP = 2; //минимальный шаг генерации строки чисел
const MAX_STEP = 4; //максимальный шаг генерации строки чисел

//Игра "Арифметическая прогрессия"
function runGameProgressive(): void
{
    $name = askNameAndSayWelcome();

    for ($a = 0; $a < ROUNDS_COUNT; ++$a) {
        $generateString = range(RANGE_START, RANGE_END, rand(MIN_STEP, MAX_STEP));
        $indexHideValue = array_rand($generateString);
        $workString = [];
        $realAnswer = 0;

        list($realAnswer, $workString) = replaceRandomNum($generateString, $indexHideValue, $realAnswer, $workString);

        $userAnswer = (int) askQuestionAndEnterAnswer(
            'What number is missing in the progression?',
            'Question: ' . implode(" ", $workString)
        );

        if (checkResult($realAnswer, $userAnswer, $name) === false) {
            return;
        }
    }
    printCongratulations($name);
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
    return array((int)$realAnswer, $workString);
}
