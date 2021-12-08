<?php

namespace App;

function Run()
{
    goToRoute(getCurrentRoute());
}

function getCurrentRoute()
{
    $urlData = parse_url($_SERVER['REQUEST_URI']);
    return $urlData['path'];
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

function goToRoute($route)
{ 
    $trimmedRoute = $route !== '/' ? rtrim($route, '/') : $route;
  
    $rules = [
        '/' => fn() => actionShowSurveyForm([]),
        '/survey' => fn() => actionSurvey(),
        '/survey/list' => fn() =>showList(),
    ];

    foreach ($rules as $pattern => $method) {
        if ($pattern === $trimmedRoute) {
            $method();
            return;
        }
        
    }
    if (preg_match('/\/survey\/(?<id>\w+)/',$trimmedRoute)){
        viewPostFile($trimmedRoute);
        return;
    }
    actionNotFound();
}

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
    $files = array_filter(scandir($path), fn($i) => $i !== '.' & $i !== '..');
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
    $postId = str_replace("/survey/","",$postId);
    var_dump($postId);
    echo file_get_contents (__DIR__."/../../storage/{$postId}.json");
}

function actionShowSurveyForm()
{
    view("SurveyForm");
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