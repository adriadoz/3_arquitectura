<?php
declare(strict_types=1);
namespace MPWAR5\Command;

final class DecrementCommandHandler extends CommandHandler
{
    public function handleDecrement(Counter $counter):void
    {
        $counter->decrementCounter();
        $this->persistData($counter);
    }
}