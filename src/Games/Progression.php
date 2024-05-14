<?php

namespace BrainGames\Games\Progressive;

use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

const RANGE_START = 2; //старт генерации строки чисел
const RANGE_END = 22; //предел генерации строки чисел
const MIN_STEP = 2; //минимальный шаг генерации строки чисел
const MAX_STEP = 4; //максимальный шаг генерации строки чисел

//Игра "Арифметическая прогрессия"
function runGameProgressive(): void
{
    $task = [];

    for ($a = 0; $a < ROUNDS_COUNT; ++$a) {
        $string = range(RANGE_START, RANGE_END, rand(MIN_STEP, MAX_STEP));
        $indexHideValue = array_rand($string);

        $readyString = replaceRandomNum($string, $indexHideValue);

        $task[] = [
            'question' => 'Question: ' . implode(" ", $readyString),
            'answer' => (string)$string[$indexHideValue]
        ];
    }
    play($task, 'What number is missing in the progression?');
}

function replaceRandomNum(array $string, int $indexHideValue): array
{
    $arr = [];
    foreach ($string as $value) {
        if ($value === $string[$indexHideValue]) {
            $value = '..';
        }
        $arr[] = $value;
    }
    return $arr;
}
