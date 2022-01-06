<?php

namespace App\Request;

use function App\Controller\createUserInDB;
use function App\Response\includeViews;

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
