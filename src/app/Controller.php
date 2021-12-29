<?php
namespace Src\App\Controller;
require_once __DIR__ . '/../../vendor/autoload.php';

use function Src\App\Request\checkPost;
use function Src\App\Request\isPost;
use function Src\App\Response\IncludeViews;
use function Src\App\Storage\getUser;
use function Src\App\Storage\start;


function actionShowList()
{
    include_once __DIR__ . '/../../config/db_config.php';
    $config = dbConfig();

    if ($config['DB_NAME'] === "json") {
        $path = __DIR__ . '/../../storage';
        $files = array_filter(scandir($path), fn($i) => $i !== '.' && $i !== '..' && $i !== '.gitignore');
        var_dump($files);
        foreach ($files as $key => $value) {
            $files[$key] = str_replace(".json", "", $value);
        }
        IncludeViews("list", [
            'files' => $files,
        ]);
    } elseif ($config['DB_NAME'] === "pgsql") {
        $id = start($config);
        IncludeViews("db", $id );
    }
}

function actionShowSurveyForm()
{
    Includeviews("body");
}

function actionNotFound()
{
    http_response_code(404);
    IncludeViews("404");
}

function actionViewPostFile($postId)
{
    require_once __DIR__ . '/../../config/db_config.php';
    $config = dbConfig();
    if ($config["DB_NAME"] == "json") {
        if (file_exists(__DIR__ . "/../../storage/{$postId}.json") === false) {
            IncludeViews("404");
            return;
        }
        $jsonFile = file_get_contents(__DIR__ . "/../../storage/{$postId}.json");
        $file = json_decode($jsonFile);
        IncludeViews("open_file", [], $file);
    } elseif ($config["DB_NAME"] === "pgsql") {
        $user = getUser($config, $postId);
        IncludeViews("open_db", $user);
    }
}


function actionFindSurvey($params)
{
    actionViewPostFile($params ?? 'null');
}

function actionSurvey()
{
    if (isPost()) {
        checkPost();
        return;
    }
    if (!array_key_exists('file', $_GET)) {
        actionNotFound();
        return;
    }
    actionFindSurvey($_GET['file']);
}


function recordInFile($data)
{
    $postId = uniqid();
    $json = json_encode($data);
    file_put_contents(__DIR__ . "/../../storage/{$postId}{$data['name']}.json", $json, FILE_APPEND);
}