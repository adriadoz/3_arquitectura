<?php
declare(strict_types=1);
namespace MPWAR5\Command;

class SyncroHandler
{
    private $commandBBDDurl;
    private $queryBBDDurl;
    private $countCopy;

    public function __construct($commandBBDDurl, $queryBBDDurl)
    {
        $this->commandBBDDurl = $commandBBDDurl;
        $this->queryBBDDurl = $queryBBDDurl;
    }

    public function __invoke():void
    {
        $file = fopen($this->commandBBDDurl, "r");
        $this->countCopy = fgets($file);
        fclose($file);
        file_put_contents($this->queryBBDDurl, $this->countCopy);
    }
}