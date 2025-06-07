<?php

declare(strict_types=1);

use App\Application;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Front controller for the application.
 * Any request which does not match a file in the `public` directory, will be routed to this file.
 */

function dump(mixed $data): void
{
    echo '<pre style="background: black; color: green; padding: 3px 5px;">' . print_r($data, true) . '</pre>';
}

function dd(mixed $data): never
{
    dump($data);
    die();
}

$application = new Application();
$application->run();
