<?php
namespace  Src\App\Storage;
require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;

function start(array $config): bool|array
{
    return prepareResponse(prepareQuery($config, connectDB($config)));
}

function getUser($config, $postID): array|bool
{
    return getUserInDB(prepareQuery($config, connectDB($config), $postID));
}

function connectDB(array $config): PDO
{
    return new PDO("{$config['DB_NAME']}:host={$config['DB_HOST']}", "{$config['DB_USERNAME']}", "{$config['DB_PASSWORD']}");
}

function prepareQuery(array $config, PDO $dbh, int $postID = null): bool|\PDOStatement
{
    if ($postID === null) {
        $sql = "select id,name from {$config['DB_DATABASE']}";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth;
    }

    $sql = "select * from {$config['DB_DATABASE']} WHERE id=:id";
    $sth = $dbh->prepare($sql);
    $sth->execute([':id' => $postID]);
    return $sth;

}

function prepareResponse(\PDOStatement $sth): bool|array
{
    return $ftl = $sth->fetchAll(PDO::FETCH_COLUMN,);
}

function getUserInDB(\PDOStatement $sth): array|bool
{
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}