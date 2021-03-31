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
            <a href="create" class="btn btn-success">
            Todoを追加する
            </a>
        </div>
        <?php foreach($posts as $post):?>
        <div class="card mb-4">
            <div class="card-header">
                <h2><?php echo $post['title'] ;?></h2>
            </div>
            <div class="card-body">
                <p>詳細：<?php echo $post['body'] ;?></p>
                <a href="/edit" class="btn btn-primary">編集する</a>
                <a href="/destroy" class="btn btn-danger">削除する</a>
            </div>

        </div>
        <?php endforeach;?>
    </div>
    </main>
<?php include($values['layouts']."footer.php");?>
</body>
</html>