<?php
declare(strict_types=1);

function dump(mixed $data): void
{
    echo '<pre style="background: black; color: green; padding: 3px 5px;">' . print_r($data, true) . '</pre>';
}

function dd(mixed $data): never
{
    dump($data);
    die();
}

dump('test');
dd($_SERVER['REQUEST_URI']);
