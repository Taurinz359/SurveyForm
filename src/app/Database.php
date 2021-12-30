<?php
namespace  Src\App\Database;

use PDO;

function connectDB(array $config): PDO
{
    return new PDO("{$config['DB_NAME']}:host={$config['DB_HOST']}", "{$config['DB_USERNAME']}", "{$config['DB_PASSWORD']}");
}

function query(PDO $dbh, string $sql, array $params = []): bool|array
{
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}
