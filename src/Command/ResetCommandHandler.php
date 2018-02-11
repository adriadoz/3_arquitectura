<?php
declare(strict_types=1);
namespace MPWAR5\Command;

final class ResetCommandHandler extends CommandHandler
{
    public function handleReset($counter):void
    {
        $counter->resetCounter();
        $this->persistData($counter);
    }
}