<?php

namespace App;

require __DIR__ . '/../../vendor/autoload.php';

use function Router\startRouting;

function Run()
{
    startRouting();

}

// function goToRoute($route)
// {
//     $rules = [
//         '/\/survey\/(?<id>\w+)/' => fn($params) => actionFindSurvey($params),
//         '/\//' => fn($params) => actionShowSurveyForm($params),
//         '/\/survey\/list/' => fn() =>showList(),
//     ];
//     foreach ($rules as $pattern => $method) {
//         if (preg_match($pattern, $route, $params)) {
//             $method($params);
//             break;
//         }
//     }
// }



function getHttpMethod()
{
    return $_SERVER['REQUEST_METHOD'];
}

function isGet()
{
    return getHttpMethod() === 'GET';
}

function isPost()
{
    return getHttpMethod() === 'POST';
}

function actionNotFound()
{
    http_response_code(404);
    view("404");
}

function redirect($route) 
{
    http_response_code(302);
    header("Location: ${route}");
    exit();
}


function actionSurvey()
{
    if (isPost()) {
        IsPostFile();
        return;
    }

    if (!array_key_exists('file', $_GET)) {
        actionNotFound();
        return;
    }

    actionFindSurvey($_GET['file']);
}

function showList (){
    $path = __DIR__ . '/../../storage';
    $files = array_filter(scandir($path), fn($i) => $i !== '.' & $i !== '..' & $i !== '.gitignore');
    view("list", [
        'files' => $files,
    ]);
}

function actionFindSurvey($params)
{
    viewPostFile($params ?? 'null');
}

function viewPostFile($postId)
{
    echo file_get_contents (__DIR__."/../../storage/{$postId}.json");
}

function actionShowSurveyForm()
{
    view("survey_form");
}

function IsPostFile()
{
    actionShowSurveyForm([]);   
    if (!empty($_POST)) {
       recordInFile($_POST);
    }
}

function view($templateName, $data = []) {
    $basePath = __DIR__ . '/../templates/';
    $suffix = '.php';

    $fullPath = $basePath . $templateName . $suffix;

    require_once $fullPath;
}

function recordInFile($data){
    $postId = uniqid();
    $json = json_encode($data);
    file_put_contents(__DIR__ . "/../../storage/{$postId}{$data['name']}.json",$json,FILE_APPEND);
}