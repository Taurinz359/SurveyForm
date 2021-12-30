<?php
namespace Src\App\Request;

use function Src\App\Controller\actionShowSurveyForm;
use function Src\App\Controller\createUserInDB;


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
        createUserInDB($_POST);
    }
}
