<?php
namespace  Src\App\Storage;
require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;

function start(array $config): bool|array
{
    return prepareResponse(prepareQuery($config, connectDB($config)));
}

function connectDB(array $config): PDO
{
    return new PDO("{$config['DB_NAME']}:host={$config['DB_HOST']}", "{$config['DB_USERNAME']}", "{$config['DB_PASSWORD']}");
}

function prepareQuery(array $config, PDO $dbh): bool|\PDOStatement
{
    $sql = "select id from {$config['DB_DATABASE']}";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    return $sth;
}

function prepareResponse(\PDOStatement $sth): bool|array
{
    return $ftl = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
}