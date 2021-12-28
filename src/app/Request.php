<?php
namespace Src\App\Request;

use function Src\App\Controller\actionShowSurveyForm;
use function Src\App\Controller\recordInFile;

require_once __DIR__ . '/../../vendor/autoload.php';

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
