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

$application = new Application();
$application->bootstrap();
$application->run();
