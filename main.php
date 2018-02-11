<?php
declare(strict_types=1);

error_reporting(E_ALL);

require_once 'vendor/autoload.php';

use MPWAR5\Command\CommandHandler;
use MPWAR5\Command\CounterRepository;

$counterRepo = new CounterRepository("../Repository/commandBBDD.txt");
$command= new CommandHandler($counterRepo);
$command->handleIncrement();
