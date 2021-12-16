<?php

namespace Router;

require_once __DIR__ . '/App.php';
require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/Response.php';

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
        '/^\/$/' => fn () => actionShowSurveyForm([]),
        '/^\/survey$/' => fn () => actionSurvey(),
        '/^\/survey\/list$/' => fn () => showList(),
        '/\/survey\/(?<id>\w+)/' => fn ($params) => viewPostFile($params['id']),

    ];
    foreach ($rules as $pattern => $method) {
        if (preg_match($pattern, $trimmedRoute, $params)) {
            $method($params);
            return;
        }
    }
    actionNotFound();
}
