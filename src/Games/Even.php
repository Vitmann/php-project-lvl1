<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\printCorrectMessage;
use function BrainGames\Engine\askNameAndSayWelcome;
use function BrainGames\Engine\printWrongAnswerMessage;
use function cli\line;
use function cli\prompt;

//Игра: "Проверка на чётность"
function even(): void
{
    $name = askNameAndSayWelcome();
    printEvenTaskQuestion();
    $arrayNumbers = [4, 6, 7];

    foreach ($arrayNumbers as $number) {
        $userAnswer = askQuestionAndEnterAnswer($number);
        $evenOrNot = ($number % 2 === 0) ? 'yes' : 'no';

        if ($evenOrNot === $userAnswer) {
            printCorrectMessage();
        } else {
            printWrongAnswerMessage($userAnswer, $evenOrNot, $name);
            return;
        }
    }
    printCongratulations($name);
}

function askQuestionAndEnterAnswer(int $num): string
{
    line("Question: {$num}");
    return prompt('Enter your answer');
}

function printEvenTaskQuestion(): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}
