<?php
namespace Router;

use function App\actionNotFound;
use function App\actionShowSurveyForm;
use function App\actionSurvey;
use function App\showList;
use function App\viewPostFile;

function startRouting(){
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
        '/^\/$/' => fn() => actionShowSurveyForm([]),
        '/^\/survey$/' => fn() => actionSurvey(),
        '/^\/survey\/list$/' => fn() =>showList(),
        '/\/survey\/(?<id>\w+)/' => fn($params) => viewPostFile($params['id']),

    ];
    foreach ($rules as $pattern => $method) {
        if(preg_match($pattern,$trimmedRoute, $params)) {
            $method($params);
            return;
        }
    }
    actionNotFound();
}
