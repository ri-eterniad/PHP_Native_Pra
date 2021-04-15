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

    protected function validation($data_title, $data_body){
        //配列初期化
        $error = array();

        if(empty($data_title) || ctype_space($data_title)){
            $error[]="タイトルを入力してください";
        }

        if(empty($data_body) || ctype_space($data_body)){
            $error[]="本文を入力してください";
        }

        if(empty($data_title) >100){
            $error[]="本文を1００文字以下にしてください";
        }

        return $error;
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

    public function store(){

        $post = array(
            "title" => $_POST['title'],
            "body" => $_POST['body']
        );

        $error = $this->validation($post['title'],$post['body']);

        if(count($error)){
            //エラーログを飛ばす
        }else{
            $dbh = $this->db_access();
        //中途半端なデータが保存されたりすることを防ぐ
        try{
            $dbh->beginTransaction();
            $sql ="INSERT INTO posts(title,body) VALUES(:title,:body)";
        //準備段階
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
            $stmt->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
            //実行
            $stmt->execute();
            $dbh->commit();
            }catch(PDOException $Exception){
                $dbh->rollBack();
            }

        }
        
        $result = array($post,$error);
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

    public function edit($article_id){
        
        $dbh = $this->db_access();

        $sql ="SELECT * FROM posts WHERE id =:id";
        //準備段階
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',$article_id,PDO::PARAM_INT);

        //実行
        $stmt->execute();
        $result =$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function confirm($article_id){
        $dbh = $this->db_access();

        $sql ="SELECT * FROM posts WHERE id =:id";
        //準備段階
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',$article_id,PDO::PARAM_INT);

        //実行
        $stmt->execute();
        $result =$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($article_id){
        
        $dbh = $this->db_access();

        //中途半端なデータが保存されたりすることを防ぐ
        try{
            $dbh->beginTransaction();
            $sql ="UPDATE posts SET title= :title, body= :body WHERE id= :id";
        //準備段階
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':title',$_POST['title'],PDO::PARAM_STR);
            $stmt->bindValue(':body',$_POST['body'],PDO::PARAM_STR);
            $stmt->bindValue(':id',$article_id,PDO::PARAM_INT);
            //実行
            $stmt->execute();
            $dbh->commit();
            }catch(PDOException $Exception){
                $dbh->rollBack();
            }
        $result = array($_POST['title'],$_POST['body']);
        return $result;
    }

    public function destroy($article_id){
        
        $dbh = $this->db_access();

        $sql ="DELETE FROM posts WHERE id =:id";
        //準備段階
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',$article_id,PDO::PARAM_INT);

        //実行
        $stmt->execute();
        return "削除が完了しました";
    }
}