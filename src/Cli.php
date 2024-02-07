<?php

namespace BrainGames\Cli;

use function BrainGames\Engine\askNameAndSayWelcome;
use function cli\line;
use function cli\prompt;

function Cli(): void
{
    askNameAndSayWelcome();
}
