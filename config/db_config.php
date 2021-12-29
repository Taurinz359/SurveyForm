<?php

function dbConfig():array
{
    return array(
        'DB_NAME' => 'pgsql',
        'DB_USERNAME' => 'postgres',
        'DB_HOST' => 'postgres',
        'DB_PORT' => '5432',
        'DB_PASSWORD' => 'example',
        'DB_DATABASE' => 'users',
    );
}
