<?php

namespace Src\App\Repositories\JsonRepository;

use function Src\App\Response\includeViews;
use function Src\App\Storage\allFiles;
use function Src\App\Storage\saveDataInJson;

function getList(): array
{
    return allFiles();
}

function getCompletedForm(string $postID): array
{
    return openUser($postID);
}

function saveData(array $data){
    saveDataInJson($data);
}

function openUser(string $postID)
{
    if (file_exists(__DIR__ . "/../../../storage/{$postID}.json") === false) {
        includeViews("404");
    }
    $jsonFile = file_get_contents(__DIR__ . "/../../.././storage/{$postID}.json");
    return json_decode($jsonFile,true);

}