<?php
namespace Src\App\Controller;

use Src\App\Repositories\Repository;
use function Src\App\Request\checkPost;
use function Src\App\Request\isPost;
use function Src\App\Response\IncludeViews;


function actionShowList()
{
    $list = Repository\call("start");
    IncludeViews("list", ['files' => $list]);
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
    $data = Repository\call("getUser",$postId);
    IncludeViews("open_file", [], $data);
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


/**
 * @throws \Exception
 * Владлен лох
 * Посхалочка
 * С новым годом!
 */
function createUserInDB($data)
{
    Repository\call("createUser", $data);
}