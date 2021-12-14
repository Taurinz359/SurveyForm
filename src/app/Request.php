<?php

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

function IsPostFile()
{
    actionShowSurveyForm();
    if (!empty($_POST)) {
        recordInFile($_POST);
    }
}
