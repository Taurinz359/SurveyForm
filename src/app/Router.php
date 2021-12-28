<?php

namespace Src\App\Router;

use function Src\App\Request\actionSurvey;
use function Src\App\Response\actionShowSurveyForm;
use function Src\App\Response\viewPostFile;

require_once __DIR__ . '/../../vendor/autoload.php';

//require_once __DIR__ . '/App.php';
//require_once __DIR__ . '/Request.php';
//require_once __DIR__ . '/Response.php';
//require_once __DIR__ . '/Controller.php';


function startRouting()
{
    goToRoute(getCurrentRoute());
}

function getCurrentRoute()
{
    $urlData = parse_url($_SERVER['REQUEST_URI']);
    return $urlData['path'];
}

function goToRoute($route)
{
    $trimmedRoute = $route !== '/' ? rtrim($route, '/') : $route;

    $rules = [
        '/^\/$/' => fn() => \actionShowSurveyForm(),
        '/^\/survey$/' => fn() => actionSurvey(),
        '/^\/survey\/list$/' => fn() => showList(),
        '/\/survey\/(?<id>\w+)/' => fn($params) => \viewPostFile($params['id']),
//        '/^\/survey\/storage$/' => fn() => Start()
    ];
    foreach ($rules as $pattern => $method) {
        if (preg_match($pattern, $trimmedRoute, $params)) {
            $method($params);
            return;
        }
    }
    actionNotFound();
}
