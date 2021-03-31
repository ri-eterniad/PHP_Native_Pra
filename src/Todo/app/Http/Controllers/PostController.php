<?php

// public function index(){
//     $dbh = $this->db_access();

//     $sql ="SELECT * FROM posts";
//     //準備段階
//     $stmt = $dbh->prepare($sql);

//     //実行
//     $stmt->execute();
//     $result =$stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// }

echo "test";
class PostController {

    public function __construct($models,$views)
    {
        $this->models =$models;
        $this->views =$views; 
    }


    public function index(){

        include($this->models."Post.php");
        $model = new Post();
        $result = $model->index();
        $posts = $result;
        include($this->views."posts/index.php");
    }

    public function create(){
        echo "crate";
    }
}