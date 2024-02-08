<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\askQuestionAndEnterAnswer;
use function BrainGames\Engine\checkResult;
use function BrainGames\Engine\printCongratulations;
use function BrainGames\Engine\askNameAndSayWelcome;

//Игра: "Проверка на чётность"
function even(): void
{
    $name = askNameAndSayWelcome();
    $arrayNumbers = [4, 6, 7];

    foreach ($arrayNumbers as $number) {
        $userAnswer = askQuestionAndEnterAnswer(
            'Answer "yes" if the number is even, otherwise answer "no".',
            "Question: {$number}"
        );

        $evenOrNot = ($number % 2 === 0) ? 'yes' : 'no';

        if (checkResult($evenOrNot, $userAnswer, $name) === false) {
            return;
        }
    }
    printCongratulations($name);
}
