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
    public function index(){

        echo "index";
        

    }

    public function create(){
        echo "crate";
    }
}