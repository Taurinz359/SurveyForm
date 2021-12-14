<?php

namespace App;

require_once __DIR__ . '/Router.php';
use function Router\startRouting;


function Run()
{
    startRouting();
}


