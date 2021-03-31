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

}

$model = new Post();
$result = $model->index();

$posts = $result;
// var_dump($posts[0]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
      crossorigin="anonymous">
    <title>TODOリスト</title>
</head>
<body>
    <div class="container m-4">
        <h1>TODOリスト</h1>
    </div>
    <?php foreach($posts as $post):?>
    <div class="container m-4">
        <div>
            <h2><?php echo $post['title'] ;?></h2>
        </div>
        <div>
            <p>詳細：<?php echo $post['body'] ;?></p>
        </div>
    </div>
    <?php endforeach;?>
    
</body>
</html>