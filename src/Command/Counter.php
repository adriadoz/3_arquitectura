<?php
declare(strict_types=1);
namespace MPWAR5\Command;


class Counter
{
    const MIN_INCREMENT = 1;
    const RESET_VALUE = 0;
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
    
    public function decrementCounter() {
        $this->count = $this->count - $this::MIN_INCREMENT;
    }
    
    public function resetCounter() {
        $this->count = $this::RESET_VALUE;
    }
}