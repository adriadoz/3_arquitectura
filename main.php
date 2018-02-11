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

if(isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'increment' :
            $incrementCommandHandler->handleIncrement($counter);
            break;
        case 'decrement' :
            $decrementCommandHandler->handleDecrement($counter);
            break;
        case 'reset' :
            $resetCommandHandler->handleReset($counter);
            break;
    }
}

$query= new QueryHandler($queryBBDD);

?>
<html>
    <head>
        <title>Counter CQRS</title>
    </head>
    <body>
        <h1>Count: <?php echo $query->getCounter(); ?></h1>
        <form action="main.php" method="post">
            <button type="submit" name="action" value="increment">+1</button>
            <button type="submit" name="action" value="decrement">-1</button>
            <button type="submit" name="action" value="reset">Reset</button>
        </form>
    </body>
</html>

