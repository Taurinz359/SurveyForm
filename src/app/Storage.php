<?php

namespace Src\App\Storage;

use function Src\App\Response\includeViews;

function allFiles(): array
{
    $path = __DIR__ . '/../../storage';
    $files = array_filter(scandir($path), fn($i) => $i !== '.' && $i !== '..' && $i !== '.gitignore');
    foreach ($files as $key => $value) {
        $files[$key] = str_replace(".json", "", $value);
    }
    return $files;
}

function saveDataInJson(array $data)
{
    $postId = uniqid();
    $json = json_encode($data);
    file_put_contents(__DIR__ . "/../../../storage/{$postId}{$data['name']}.json", $json, FILE_APPEND);
}