<?php
namespace Src\App\Response;
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../templates/index.php";




function redirect($route)
{
    http_response_code(302);
    header("Location: ${route}");
    exit();
}



