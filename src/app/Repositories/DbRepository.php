<?php

namespace Src\App\Repositories\DbRepository;

use PDO;
use function Src\App\Database\connectPgsql;
use function Src\App\Database\query;
use function Src\App\Repositories\Repository\getConfig;

function getConnection(): \PDO
{
    return connectPgsql(getConfig());
}

function getList(): array
{
    $connection = getConnection();

    $sql = "SELECT id FROM users";

    $ids = query($connection, $sql);

    return array_map(fn($i) => $i['id'], $ids);
}

function getCompletedForm($postID): array
{   $sql = "select * from users WHERE id=:id";
    return query(getConnection(),$sql,[':id' => $postID]);
}

function saveData($data){
    $dbh = getConnection();
    $sql = "insert into users (name, email, age, role, recomend, improve, comment) values (?,?,?,?,?,?,?)";
    $sth = $dbh -> prepare($sql);
    $sth ->execute([
        $data["name"],
        $data["email"],
        $data["age"],
        $data["role"],
        $data["recomend"],
        $data["improve"],
        $data ["comment"]
    ]);
}
