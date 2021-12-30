<?php

namespace Src\App\Response;

function redirect($route)
{
    http_response_code(302);
    header("Location: ${route}");
    exit();
}


function IncludeViews ($templateName, $data = [] , $file = null) {
    $views = "/views/{$templateName}.php";
    require_once __DIR__ . '/../templates/survey_form.php';
}
