<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use MPWAR5\Command\CommandHandler;
use MPWAR5\Command\CounterRepository;
use MPWAR5\Command\Counter;
use MPWAR5\Command\SyncroHandler;
use MPWAR5\Query\QueryHandler;

$commandBBDD = "src/Repository/commandBBDD.txt";
$queryBBDD = "src/Repository/queryBBDD.txt";

$counterCommandRepo = new CounterRepository($commandBBDD);
$counterQueryRepo = new SyncroHandler($commandBBDD, $queryBBDD);

$counter = new Counter($counterCommandRepo->getCount());

$commandHandler= new CommandHandler($counterCommandRepo, $counterQueryRepo);
$commandHandler->handleIncrement($counter);

$query= new QueryHandler($queryBBDD);
echo $query->getCounter();
