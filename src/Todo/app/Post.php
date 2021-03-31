<?php

class Post {
    //vagrantのサーバー
    private $DB_HOST ="192.168.33.12";
    private $DB_NAME ="php_yoshi";
    private $DB_USER ="yoshi";
    private $DB_PASSWORD ="phpHacks2021@";

    //DBへの接続関数
    protected function db_access(){
        //PHPがエラーを吐くようにする
        error_reporting(E_ALL & ~E_NOTICE);

        //データベースへの接続
        //公式から雛形持ってくる
        try {
            $dbh = new PDO('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME, $this->DB_USER, $this->DB_PASSWORD);
            //あくまで接続は別で記述する
            return $dbh;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function index(){
        $dbh = $this->db_access();

        $sql ="SELECT * FROM posts";
        //準備段階
        $stmt = $dbh->prepare($sql);

        //実行
        $stmt->execute();
        $result =$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create(){
        $dbh = $this->db_access();

        $sql ="INSERT INTO posts ('title','body') VALUES(:title,:body)";
        
        //準備段階
        $stmt = $dbh->prepare($sql);

        //実行
        $stmt->execute();
        $result =$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}