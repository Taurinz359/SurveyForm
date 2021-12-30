<?php

namespace Src\App\Repositories\DbRepository;

use PDO;
use function Src\App\Database\connectDB;
use function Src\App\Database\query;
use function Src\App\Repositories\Repository\getConfig;

function getConnection(): \PDO
{
    return connectDB(getConfig());
}

function start(): array
{
    $connection = getConnection();

    $sql = "SELECT id FROM users";

    $ids = query($connection, $sql);

    return array_map(fn($i) => $i['id'], $ids);
}

function getUser($postID): array
{
    return prepareQuery(getConnection(),$postID);
}

function prepareQuery(PDO $dbh, int $postID = null): bool|array
{
    $sql = "select * from users WHERE id=:id";
    $sth = (query($dbh, $sql, [':id' => $postID]));
    return $sth[0];
}