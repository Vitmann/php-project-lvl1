<?php

namespace BrainGames\Welcome;

use function cli\line;
use function cli\prompt;

function Welcome () {
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}