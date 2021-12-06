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
    require_once __DIR__ . "/../templates/404.php";
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
        writePostFile();
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
    require_once __DIR__ . '/../templates/list.php';
}

function actionFindSurvey($params)
{
    viewPostFile($params ?? 'null');
}


function actionShowSurveyForm(array $params)
{
    require_once __DIR__ . '/../templates/SurveyForm.php';
}


function viewPostFile($postId)
{
    echo file_get_contents(__DIR__."/../../storage/{$postId}");
}

function writePostFile()
{
    actionShowSurveyForm([]);   
    if (!empty($_POST)) {
        $postId = uniqid();
        foreach ($_POST as $value) {
            file_put_contents(__DIR__ . "/../../storage/{$postId}.txt" , $value,FILE_APPEND);
        }
    }
    return $postId;
}