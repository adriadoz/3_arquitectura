<?php
declare(strict_types=1);
namespace MPWAR5\Command;

final class CounterRepository implements ICounterRepository
{
    private $file = "";

    public function __construct($bbdd)
    {
        $this->file = $bbdd;
    }
    
    public function setCount($count):void
    {
        file_put_contents($this->file, $count);
    }
    
    public function getCount()
    {
        $file = fopen($this->file, "r");
        $count = intval(fgets($file));
        fclose($file);
        return $count;
    }
}