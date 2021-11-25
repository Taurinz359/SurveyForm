<?php

namespace App\Run;
function Run()
{
    showPostFile();
}

function getCurrentRoute()
{
    $route='';

    return $route;
}

function goToRoute($route)
{

}

function view($template, $data)
{

}
function showPostFile()
{
    if (!empty($_POST)) {
        foreach ($_POST as $value) {
            file_put_contents(__DIR__ . "/../../storage/post.txt" , $value,FILE_APPEND);
        }
    }
}