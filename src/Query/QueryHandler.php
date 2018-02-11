<?php
declare(strict_types=1);

namespace MPWAR5\Query;

final class QueryHandler
{
    private $queryBBDDurl;
    private $count = 0;

    public function __construct($queryBBDD)
    {
        $this->queryBBDDurl = $queryBBDD;
    }

    public function getCounter(): int
    {
        $file = fopen($this->queryBBDDurl, "r");
        $this->count = fgets($file);
        fclose($file);
        return (Int)$this->count;
    }
}