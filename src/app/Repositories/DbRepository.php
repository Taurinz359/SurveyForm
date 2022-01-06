<?php

namespace App\Repositories\DbRepository;

use PDO;

use function App\Database\connectPgsql;
use function App\Database\query;
use function App\Repositories\Repository\getConfig;

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
{
    $sql = "SELECT * FROM users WHERE id=:id";
    return query(getConnection(), $sql, [':id' => $postID]);
}

function saveData($data)
{
    $dbh = getConnection();
    $sql = "INSERT INTO users (name, email, age, role, recomend, improve, comment) VALUES (?,?,?,?,?,?,?)";
    $sth = $dbh -> prepare($sql);
    $sth ->execute(
        [
        $data["name"],
        $data["email"],
        $data["age"],
        $data["role"],
        $data["recomend"],
        $data["improve"],
        $data ["comment"]
        ]
    );
}
