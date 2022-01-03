<?php
namespace Src\App\Request;

use function Src\App\Controller\createUserInDB;
use function Src\App\Response\includeViews;


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
    includeViews("body");
    if (!empty($_POST)) {
        createUserInDB($_POST);
    }
}
