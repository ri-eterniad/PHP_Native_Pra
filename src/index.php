<?php 

echo "やあ、世界";
echo "<br>";

//変数
$baseball =42;
$soccer =20;
$backetball =60;
$music =50;

echo "音楽の部員は".$music."人です。";
echo "<br>";

//配列
$data1=array(
    "name" => "Kazu" ,
    "sex" => 1);
$data2=array(
    "name" => "Kazumasa",
    "sex" => 1);
$data3=array(
    "name" => "Mina",
    "sex" => 0);

$friends =array($data1,$data2,$data3);

foreach($friends as $friend){
    
    if($friend["sex"] == 0){
        echo $friend["name"]."は女性です";
    }else{
        echo $friend["name"]."は男性です";
    }
}
?>
HTMLとして書く
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>連想配列if,foreach文の基本</title>
</head>
<body>
<p>↑上記のphpのecho文は練習なので気にしないで</p>
<?php foreach($friends as $friend):?>
    <div>
        <div>
            <h1><?php echo "名前:".$friend["name"] ;?></h1>
        </div>
        <?php if($friend["sex"]==0):?>
        <div>
            <p>女性です</p>
        </div>
        <?php else :?>
        <div>
            <p>男性です</p>
        </div>
        <?php endif;?>
    </div>
<?php endforeach;?>
</body>
</html>

<?php
//関数
//4試合の平均均得点を知りたい 
function Ave($a,$b,$c,$d){
    return ($a + $b + $c + $d)/4;
}

$myAve =ave(67,34,72,90);

echo "平均得点は".$myAve."点です。";

//クラス

class Persona{
    protected $name ="名前"; 
    protected $hobby ="趣味"; 
    protected $age ="年齢"; 

    //メソッド
    public function __construct($name,$hobby,$age){
        $this->name = $name;
        $this->hobby = $hobby;
        $this->age = $age;
    }

    public function getName(){
        return $this->name;
    }

    public function getHobby(){
        return $this->hobby;
    }

    public function getAge(){
        return $this->age;
    }
}

$koki = new Persona("Koki","バスケ",13);
$name =$koki->getName();
$hobby =$koki->getHobby();
$age =$koki->getAge();

echo "<br>";

echo "私は".$name."。趣味は".$hobby."。".$age."才よよろしく。";

?>