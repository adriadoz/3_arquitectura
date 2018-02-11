<?php
declare(strict_types=1);
namespace MPWAR5\Command;


class Counter
{
    const MIN_INCREMENT = 1;
    private $count;
    
    public function __construct($count)
    {
        $this->count = $count;
    }
    
    public function getCount()
    {
        return $this->count;
    }
    
    public function incrementCounter()
    {
        $this->count = $this->count + $this::MIN_INCREMENT;
    }
}