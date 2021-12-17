<?php

function showList (){
    require_once __DIR__ . '/../templates/index.php';
    $path = __DIR__ . '/../../storage';
    $files = array_filter(scandir($path), fn($i) => $i !== '.' & $i !== '..' & $i !== '.gitignore');
    foreach($files as $key =>  $value){
        $files[$key] = str_replace (".json","", $value);
    }
    IncludeViews("list", [
        'files' => $files,
    ]);
    
}

function actionFindSurvey($params)
{
    viewPostFile($params ?? 'null');
}

// function view($templateName, $data = []) {
//     require_once __DIR__ . '/../templates/index.php';
//     $basePath = __DIR__ . '/../templates/';
//     $suffix = '.php';
//     IncludeViews($templateName);



//     // $fullPath = $basePath . $templateName . $suffix;
//     // require_once $fullPath;
// }

function recordInFile($data){
    $postId = uniqid();
    $json = json_encode($data);
    file_put_contents(__DIR__ . "/../../storage/{$postId}{$data['name']}.json",$json,FILE_APPEND);
}