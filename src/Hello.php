<?php

namespace BrainGames\Hello;

use function cli\line;
use function cli\prompt;

function Hello() {
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, ' . $name);
}