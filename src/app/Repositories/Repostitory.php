<?php

namespace App\Repositories\Repository;

function getConfig(): array
{
    include_once __DIR__ . '/../../../config/db_config.php';
    return dbConfig();
}

function getDriver()
{
    $config = getConfig();
    return $config['DB_NAME'];
}

function call(string $methodName, ...$args)
{
    $driver = getDriver();

    if ($driver === 'json') {
        return "App\\Repositories\\JsonRepository\\{$methodName}"(...$args);
    }

    if ($driver === 'pgsql') {
        return "App\\Repositories\\DbRepository\\{$methodName}"(...$args);
    }

    throw new \Exception('Undefined Driver');
}
