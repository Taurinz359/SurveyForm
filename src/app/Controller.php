<?php
namespace Src\App\Controller;

use Src\App\Repositories\Repository;
use function Src\App\Request\checkPost;
use function Src\App\Request\isPost;
use function Src\App\Response\includeViews;


function actionShowList()
{
    $list = Repository\call("getList");
    includeViews("list", ['files' => $list]);
}

function actionNotFound()
{
    http_response_code(404);
    includeViews("404");
}

function actionViewPostFile($postId)
{
    $data = Repository\call("getCompletedForm",$postId);
    includeViews("open_file", [], $data);
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
    Repository\call("saveData", $data);
}