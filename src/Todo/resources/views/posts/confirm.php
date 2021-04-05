<?php var_dump($posts);?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php include($values["layouts"]."meta.php");?>
</head>
<body>
<?php include($values['layouts']."header.php");?>
<main>
    <div class="container">
        <div class="my-4">
            <p class="fw-bold text-danger">※本当に以下のTodoを削除しますか？</p>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h2><?php echo $posts['title'] ;?></h2>
            </div>
            <div class="card-body">
                <p>詳細：<?php echo $posts['body'] ;?></p>
                <a href="/" class="btn btn-primary">TOPに戻る</a>
                <a href="<?php echo "/destroy/".$posts['id']; ?>" class="btn btn-danger">削除する</a>
            </div>
        </div>
    </div>
    </main>
<?php include($values['layouts']."footer.php");?>
</body>
</html>