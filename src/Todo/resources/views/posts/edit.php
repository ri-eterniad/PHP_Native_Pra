<!DOCTYPE html>
<html lang="ja">
<head>
<?php include($values["layouts"]."meta.php");?>
</head>
<body>
<?php include($values['layouts']."header.php");?>
    <main>
    <div class="container mb-4">
    <h2 class="mt-4">編集画面</h2>
    <form method="POST" action=<?php echo "/update/".$posts['id'];?>>
        <fieldset>
            <div class="form-group my-4">
                <label class="font-weight-bold mb-4">本文</label>
                <input class="form-control" 
                    type="text" 
                    name="title" 
                    id="title"
                    value="<?php echo $posts['title'] ;?>">
            </div>
            <div class="form-group my-4">
                <label class="font-weight-bold mb-4">詳細</label>
                <textarea 
                class="form-control" 
                name="body" 
                id="body"
                cols="30" 
                rows="10"
                ><?php echo $posts['body'] ;?>
                </textarea>
            </div>

            <div>
                <a href="/" class="btn btn-secondary">キャンセル</a>
                <button type="submit" class="btn btn-primary">更新する</button>
            </div>
        </fieldset>
    </form>
    </div>
    </main>
<?php include($values['layouts']."footer.php");?>
</body>
</html>