<?php

declare(strict_types=1);

/**
 * Debugging functions for the application.
 */

if (!function_exists('dump')) {
    function dump(mixed $data): void
    {
        echo '<pre style="background: black; color: green; padding: 3px 5px;">' . print_r($data, true) . '</pre>';
    }
}

if (!function_exists('dd')) {
    function dd(mixed $data): never
    {
        dump($data);
        die();
    }
}
