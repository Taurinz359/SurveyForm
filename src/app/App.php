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
    view("templates/404");
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
    view("templates/list");
}

function actionFindSurvey($params)
{
    viewPostFile($params ?? 'null');
}


function actionShowSurveyForm()
{
    view("templates/SurveyForm");
}


function viewPostFile($postId)
{
    echo view("/storage",$postId);
}

function IsPostFile()
{
    actionShowSurveyForm([]);   
    if (!empty($_POST)) {
       recordInFile();
    }
}

function view($file, $postId = null, $value = null){
    if($file === "templates/SurveyForm"){
        require_once __DIR__ . '/../templates/SurveyForm.php';
    }
    elseif($file === "templates/404"){
        return require_once __DIR__ . '/../templates/404.php';
    }
    elseif($file === "templates/list"){
        $path = __DIR__ . '/../../storage';
        $files = array_filter(scandir($path), fn($i) => $i !== '.' & $i !== '..');
        require_once __DIR__ . '/../templates/list.php';
    }
    elseif($file === "/storage" && $postId !== null){
        return file_get_contents (__DIR__."/../../storage/{$postId}");
    }
}

function recordInFile(){
    $postId = uniqid();

    $json = json_encode($_POST);
    file_put_contents(__DIR__ . "/../../storage/{$postId}.json",$json,FILE_APPEND);
    // foreach ($_POST as $value) {
    //     file_put_contents(__DIR__ . "/../../storage/{$postId}.json" , "{$value} ",FILE_APPEND);
    // }
}