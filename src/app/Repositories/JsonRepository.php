<?php

namespace Src\App\Repositories\JsonRepository;

use function Src\App\Storage\allFiles;
use function Src\App\Storage\openUser;

function start(): array
{
    return allFiles();
}

function getUser(string $postID): array
{
    return openUser($postID);
}

function createUser(array $data){
    $postId = uniqid();
    $json = json_encode($data);
    file_put_contents(__DIR__ . "/../../../storage/{$postId}{$data['name']}.json", $json, FILE_APPEND);
}