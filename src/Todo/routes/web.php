<?php
$url_text =$_GET['url'];
//$url_textを/で分割する
$params = explode('/',$url_text);

//ファイルパスを指定
$webroot = $_SERVER['DOCUMENT_ROOT'];

include($webroot."/../app/Http/Controllers/PostController.php");

$postcontroller = new PostController();
//switch case分でパラメータの値によって、処理を分ける
switch ($params[0]){

    case "";
        $postcontroller->index();
        break;

    case "create";
        $postcontroller->create();
        break;
}