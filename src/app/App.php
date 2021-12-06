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
    $rules = [
        '/' => fn() => actionShowSurveyForm([]),
        '/survey' => fn() => writePostFile(),
        '/survey/list' => fn() =>showList(),
    ];
    foreach ($rules as $pattern => $method) {
        if ($pattern === $route) {
            $method();
            break;
        }
        elseif(!empty($_SERVER['QUERY_STRING'])){
            actionFindSurvey($_GET['file']);
        }
        else{
            require_once __DIR__ . "/../templates/404.php";
        }
    }
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