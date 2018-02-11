<?php
declare(strict_types=1);
namespace MPWAR5\Command;

final class IncrementCommandHandler extends CommandHandler
{
    public function handleIncrement(Counter $counter):void
    {
        $counter->incrementCounter();
        $this->persistData($counter);
    }
}