<?php


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

function viewPostFile($postId)
{
    echo file_get_contents (__DIR__."/../../storage/{$postId}.json");
}

function actionShowSurveyForm()
{
    view("survey_form");
}