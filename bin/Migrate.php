<?php

declare(strict_types=1);

use Migrations\Migrations201804101955;

define('ROOT_DIR',dirname(__DIR__));

require ROOT_DIR . '/vendor/autoload.php';

$injector = include(ROOT_DIR . '/src/Dependencies.php');

$connection = $injector->make('Doctrine\DBAL\Connection');

$migration = new Migrations201804101955($connection);

$migration->migrate();

echo 'Finnished running migration' . PHP_EOL;