<?php
declare(strict_types=1);
namespace MPWAR5\Command;

final class CommandHandler
{
    private $counterRepository;
    private $syncroHandler;

    public function __construct(CounterRepository $counterRepository, SyncroHandler $syncroHandler)
    {
        $this->counterRepository = $counterRepository;
        $this->syncroHandler = $syncroHandler;
    }

    public function handleIncrement(Counter $counter):void
    {
        $counter->incrementCounter();
        $this->persistData($counter);
    }

    private function persistData(Counter $counter):void
    {
        $this->counterRepository->setCount($counter->getCount());
        $this->syncroHandler->__invoke();
    }
}