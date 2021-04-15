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
class PostController {

    public function __construct($models,$views)
    {
        $this->models =$models;
        $this->views =$views; 
    }

    public function layouts(){

        $values =array(
            "layouts" => $this->views."layouts/"
        );
        return $values;
    }


    public function index(){

        $values =$this->layouts();
        include($this->models."Post.php");
        $model = new Post();
        $result = $model->index();
        $posts = $result;
        include($this->views."posts/index.php");
    }

    public function store(){

        $values =$this->layouts();
        include($this->models."Post.php");
        $model = new Post();
        $result = $model->store();
        $posts = $result[0];
        $error = $result[1];

        if(count(($error))){
            include($this->views."posts/create.php");
        }else{
            header('Location: http://192.168.33.12/');
        }
    }

    public function create(){
        $values =$this->layouts();
        include($this->models."Post.php");
        $model = new Post();
        $result = $model->index();
        $posts = $result;
        include($this->views."posts/create.php");
    }
    

    public function edit($article_id){
        $values =$this->layouts();
        include($this->models."Post.php");
        $model = new Post();
        $result = $model->edit($article_id);
        $posts = $result[0];
        include($this->views."posts/edit.php");
    }

    public function confirm($article_id){

        $values =$this->layouts();
        include($this->models."Post.php");
        $model = new Post();
        $result = $model->confirm($article_id);
        $posts = $result[0];
        include($this->views."posts/confirm.php");
    }

    public function update($article_id){
        $values =$this->layouts();
        include($this->models."Post.php");
        $model = new Post();
        $result = $model->update($article_id);
        header('Location: http://192.168.33.12/');
    }

    public function destroy($article_id){
        $values =$this->layouts();
        include($this->models."Post.php");
        $model = new Post();
        $result = $model->destroy($article_id);
        header('Location: http://192.168.33.12/complete/');
    }
    
    public function complete(){

        $values =$this->layouts();
        include($this->views."posts/complete.php");
    }
}