<?php

namespace App;

function Run()
{
    goToRoute(getCurrentRoute());
}

function getCurrentRoute()
{
    $urlData = parse_url($_SERVER['REQUEST_URI']);
    var_dump($urlData);
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
        '/survey/id' => fn() => actionFindSurvey([]),
        '/' => fn() => actionShowSurveyForm([]),
        '/survey/list' => fn() =>showList(),
    ];
    foreach ($rules as $pattern => $method) {
        if ($pattern === $route) {
            $method();
            break;
        }
    }
}

function showList (){
    require_once __DIR__ . '';
}

function actionFindSurvey(array $params)
{
    viewPostFile($params['id'] ?? 'null');
}


function actionShowSurveyForm(array $params)
{
    require_once __DIR__ . '/../templates/SurveyForm.php';
}


function viewPostFile($postId)
{
    echo file_get_contents(__DIR__."/../../storage/{$postId}.txt");
}

function writePostFile()
{
    if (!empty($_POST)) {
        $postId = uniqid();
        foreach ($_POST as $value) {
            file_put_contents(__DIR__ . "/../../storage/{$postId}.txt" , $value,FILE_APPEND);
        }
    }
    return $postId;
}