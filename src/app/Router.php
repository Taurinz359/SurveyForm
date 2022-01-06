<?php

namespace App\Router;

use function App\Controller\actionNotFound;
use function App\Controller\actionShowBody;
use function App\Controller\actionShowList;
use function App\Controller\actionSurvey;
use function App\Controller\actionViewPostFile;
use function App\Response\includeViews;

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
        '/^\/$/' => fn() => actionShowBody(),
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
