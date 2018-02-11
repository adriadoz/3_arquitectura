<?php
declare(strict_types=1);
namespace MPWAR5\Command;

class CommandHandler
{
    private $counterRepository;
    private $syncroHandler;

    public function __construct(CounterRepository $counterRepository, SyncroHandler $syncroHandler)
    {
        $this->counterRepository = $counterRepository;
        $this->syncroHandler = $syncroHandler;
    }

    protected function persistData(Counter $counter):void
    {
        $this->counterRepository->setCount($counter->getCount());
        $this->syncroHandler->__invoke();
    }
}