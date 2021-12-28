<?php

namespace Src\App\Router;

use function Src\App\Controller\actionNotFound;
use function Src\App\Controller\actionShowList;
use function Src\App\Controller\actionShowSurveyForm;
use function Src\App\Controller\actionSurvey;
use function Src\App\Controller\actionViewPostFile;
use function Src\App\Storage\Start;

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
        '/^\/$/' => fn() => actionShowSurveyForm(),
        '/^\/survey$/' => fn() => actionSurvey(),
        '/^\/survey\/list$/' => fn() => actionShowList(),
        '/\/survey\/(?<id>\w+)/' => fn($params) => actionViewPostFile($params['id']),
    ];
    foreach ($rules as $pattern => $method) {
        if (preg_match($pattern, $trimmedRoute, $params)) {
            $method($params);
            return;
        }
    }
    actionNotFound();
}
