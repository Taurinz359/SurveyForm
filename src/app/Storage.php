<?php
namespace Src\App\Storage;

use function Src\App\Response\IncludeViews;

function allFiles(): array
{
    $path = __DIR__ . '/../../storage';
    $files = array_filter(scandir($path), fn($i) => $i !== '.' && $i !== '..' && $i !== '.gitignore');
    foreach ($files as $key => $value) {
        $files[$key] = str_replace(".json", "", $value);
    }
    return $files;
}

function openUser(string $postID)
{
    if (file_exists(__DIR__ . "/../../storage/{$postID}.json") === false) {
        IncludeViews("404");
    }
    $jsonFile = file_get_contents(__DIR__ . "/../../storage/{$postID}.json");
    return json_decode($jsonFile,true);
}