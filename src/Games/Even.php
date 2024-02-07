<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\correct;
use function BrainGames\Engine\askNameAndSayWelcome;
use function BrainGames\Engine\wrongAnswerMessage;
use function cli\line;
use function cli\prompt;

//Игра: "Проверка на чётность"
function Even(): void
{
    $name = askNameAndSayWelcome();
    EvenTask();
    $arrayNumbers = [4, 6, 7];

    foreach ($arrayNumbers as $number) {
        $userAnswer = askQuestionAndEnterAnswer($number);
        $evenOrNot = ($number % 2 === 0) ? 'yes' : 'no';

        if ($evenOrNot === $userAnswer) {
            correct();
        } else {
            wrongAnswerMessage($userAnswer, $evenOrNot, $name);
            return;
        }
    }
    congratulations($name);
}

function askQuestionAndEnterAnswer(int $num): string
{
    line("Question: {$num}");
    return prompt('Enter your answer');
}

function EvenTask(): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}
