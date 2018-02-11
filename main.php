<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use MPWAR5\Command\IncrementCommandHandler;
use MPWAR5\Command\DecrementCommandHandler;
use MPWAR5\Command\ResetCommandHandler;
use MPWAR5\Command\CounterRepository;
use MPWAR5\Command\Counter;
use MPWAR5\Command\SyncroHandler;
use MPWAR5\Query\QueryHandler;

$commandBBDD = "src/Repository/commandBBDD.txt";
$queryBBDD = "src/Repository/queryBBDD.txt";

$counterCommandRepo = new CounterRepository($commandBBDD);
$counterQueryRepo = new SyncroHandler($commandBBDD, $queryBBDD);

$counter = new Counter($counterCommandRepo->getCount());

$incrementCommandHandler= new IncrementCommandHandler($counterCommandRepo, $counterQueryRepo);
$decrementCommandHandler= new DecrementCommandHandler($counterCommandRepo, $counterQueryRepo);
$resetCommandHandler= new ResetCommandHandler($counterCommandRepo, $counterQueryRepo);

$incrementCommandHandler->handleIncrement($counter);
//$decrementCommandHandler->handleDecrement($counter);
//$resetCommandHandler->handleReset($counter);

$query= new QueryHandler($queryBBDD);
echo $query->getCounter();
