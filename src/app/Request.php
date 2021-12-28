<?php
namespace Src\App\Request;

require_once __DIR__ . '/../../vendor/autoload.php';

function actionSurvey()
{
    if (isPost()) {
        checkPost();
        return;
    }
    if (!array_key_exists('file', $_GET)) {
        actionNotFound();
        return;
    }
    actionFindSurvey($_GET['file']);
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

function checkPost()
{
    actionShowSurveyForm();
    if (!empty($_POST)) {
        recordInFile($_POST);
    }
}
