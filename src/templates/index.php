<?php 

function IncludeViews ($templateName, $data = [] , $file = null) {
    $views = "/views/{$templateName}.php";
    require_once __DIR__ . '/survey_form.php';
}