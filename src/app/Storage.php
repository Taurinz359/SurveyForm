<?php
namespace  Src\App\Storage;
require_once __DIR__ . '/../../vendor/autoload.php';
use PDO;

function Start(array $config) {
    $dbh = new PDO('pgsql:host = localhost', 'postgres', 'example');
    $sql = 'select * from users';
    $sth = $dbh -> prepare($sql);
    $sth ->execute();
    $ftl = $sth ->fetchAll();
    var_dump($ftl[0]);
}