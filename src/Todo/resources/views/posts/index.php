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