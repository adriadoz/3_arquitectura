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

    public function handleIncrement():void
    {
        $this->counterRepository->incrementCounter();
        $this->persistData();
    }
    public function persistData():void
    {
        $this->counterRepository->setCount();
        $this->syncroHandler->__invoke();
    }
}