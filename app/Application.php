<?php

declare(strict_types=1);

namespace App;

final class Application
{
    public function __construct()
    {
    }

    public function bootstrap(): void
    {
        require dirname(__DIR__) . '/bootstrap/paths.php';
        require BOOTSTRAP_DIR . DS . 'debug.php';
    }

    public function run(): void
    {
        echo 'Application is running!';
    }
}
