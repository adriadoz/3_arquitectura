<?php
declare(strict_types=1);
namespace MPWAR5\Command;

final class CounterRepository
{

    protected const MIN_INCREMENT = 1;
    private $actualCount = 0;
    private $file = "";

    public function __construct($bbdd)
    {
        $file = fopen($bbdd, "r");
        $this->actualCount = fgets($file);
        fclose($file);
        $this->file = $bbdd;
    }

    public function incrementCounter():void
    {
        $this->actualCount = $this->actualCount + $this::MIN_INCREMENT;
    }

    public function getCount():int
    {
        return $this->actualCount;
    }

    public function setCount():void
    {
        file_put_contents($this->file, $this->actualCount);
    }
}