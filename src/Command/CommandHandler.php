<?php
declare(strict_types=1);
namespace MPWAR5\Command;

final class CommandHandler
{
    private $counterRepository;

    public function __construct(CounterRepository $counterRepository)
    {
        $this->counterRepository = $counterRepository;
    }

    public function handleIncrement():void
    {
        $this->counterRepository->incrementCounter();
    }
    public function persistData():void
    {
        $this->counterRepository->setCount();
    }
}