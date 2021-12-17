<?php
require_once __DIR__ . "/../templates/index.php";

function actionNotFound()
{
    http_response_code(404);
    IncludeViews("404");
}

function redirect($route)
{
    http_response_code(302);
    header("Location: ${route}");
    exit();
}

function viewPostFile($postId)
{
    if (file_exists(__DIR__ . "/../../storage/{$postId}.json") === false) {
        IncludeViews("404");
        return;
    }
    $jsonFile = file_get_contents(__DIR__ . "/../../storage/{$postId}.json");
    $file = json_decode($jsonFile);
    IncludeViews("open_file", [], $file);
}

function actionShowSurveyForm()
{
    Includeviews("body");
}
