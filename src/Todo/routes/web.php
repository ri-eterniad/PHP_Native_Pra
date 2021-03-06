<?php
$url_text =$_GET['url'];
//$url_textを/で分割する
$params = explode('/',$url_text);

//ファイルパスを指定
$webroot = $_SERVER['DOCUMENT_ROOT'];
//ルータでviewとmodelのファイルパスを定義して渡す
$models = $webroot."/../app/";
$views = $webroot."/../resources/views/";

include($webroot."/../app/Http/Controllers/PostController.php");

$postcontroller = new PostController($models,$views);

//switch case分でパラメータの値によって、処理を分ける
switch ($params[0]){

    case "";
        $postcontroller->index();
        break;
    case "create";
        $postcontroller->create();
        break;
    case "edit";
        $postcontroller->edit($params[1]);
        break;
    case "store";
        $postcontroller->store();
        break;
    case "update";
        $postcontroller->update($params[1]);
        break;
    case "confirm";
        $postcontroller->confirm($params[1]);
        break;
    case "destroy";
        $postcontroller->destroy($params[1]);
        break;
    case "complete";
        $postcontroller->complete();
        break;
}


