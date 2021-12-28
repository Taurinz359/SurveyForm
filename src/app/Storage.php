<?php
// todo: learn postgres and release db and system control version.
namespace  Src\App\Storage;

use PDO;

function Start(){
    $dbh = new PDO('pgsql:host = localhost', 'postgres', 'example');
    $sql = 'select * from users';
    $sth = $dbh -> prepare($sql);
    $sth ->execute();
    $ftl = $sth ->fetchAll();
    var_dump($ftl[0]);
}