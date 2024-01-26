<?php

namespace BrainGames\Cli;

use function BrainGames\Welcome\Welcome;
use function cli\line;
use function cli\prompt;

function Cli()
{
    return Welcome();
}
