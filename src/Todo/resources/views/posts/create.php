<!DOCTYPE html>
<html lang="ja">
<head>
<?php include($values["layouts"]."meta.php");?>
</head>
<body>
<?php include($values['layouts']."header.php");?>
    <main>
    <div class="container mb-4">
    <h2 class="mt-4">Todo新規追加</h2>
    <form method="POST" action="store">
        <fieldset>
            <div class="form-group my-4">
                <label class="font-weight-bold mb-4">本文</label>
                <input class="form-control" 
                    type="text" 
                    name="title" 
                    id="title">
            </div>
            <div class="form-group my-4">
                <label class="font-weight-bold mb-4">詳細</label>
                <textarea 
                class="form-control" 
                name="body" 
                id="body"
                cols="30" rows="10"></textarea>
            </div>

            <div>
                <a href="/" class="btn btn-secondary">キャンセル</a>
                <button type="submit" class="btn btn-primary">作成する</button>
            </div>
        </fieldset>
    </form>
    </div>
    </main>
<?php include($values['layouts']."footer.php");?>
</body>
</html>