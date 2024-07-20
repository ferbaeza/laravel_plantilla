<?php

use Faker\Generator;
use Illuminate\Container\Container;

require_once __DIR__ . '/../../vendor/autoload.php';

$commands = [
    'config:cache',
    // 'event:cache',
    // 'route:cache', // No se si es pq hay pocos tests con rutas pero de momento no compensa
];
foreach ($commands as $command) {
    // $app->call($command);

    $output = shell_exec("php " . __DIR__ . "/../../artisan $command");
}