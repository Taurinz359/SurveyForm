<?php
namespace App\Controller;

use App\Repositories\Repository;
use function App\Request\isPost;
use function App\Response\includeViews;

function actionShowBody(){
    includeViews("body");
}

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
    actionViewPostFile($_GET['file']);
}
function checkPost()
{
    includeViews("body");
    if (!empty($_POST)) {
        createUserInDB($_POST);
    }
}

function createUserInDB($data)
{
    Repository\call("saveData", $data);
}