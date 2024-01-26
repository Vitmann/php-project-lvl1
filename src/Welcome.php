<?php

namespace BrainGames\Welcome;

use function cli\line;
use function cli\prompt;

function Welcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
