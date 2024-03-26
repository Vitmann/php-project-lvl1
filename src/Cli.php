<?php

namespace BrainGames\Cli;

use function BrainGames\Engine\askNameAndSayWelcome;
use function cli\line;
use function cli\prompt;

function runCli(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
