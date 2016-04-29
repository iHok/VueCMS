<?php
require_once __DIR__.'include/mysqli.php';

//ハッシュ化に使用する定数
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$status = "none";

if(!empty($_POST["username"]) && !empty($_POST["password"])){
  //パスワードはハッシュ化する
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  //ユーザ入力を使用するのでプリペアドステートメントを使用
  $stmt = $mysqli->prepare("INSERT INTO users (username,password) VALUES (?, ?)");
  $stmt->bind_param('ss', $_POST["username"], $password);

  if($stmt->execute())
    $status = "ok";
  else
    //既に存在するユーザ名だった場合INSERTに失敗する
    $status = "failed";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>新規登録</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
    <h1>新規登録</h1>
    <?php if($status == "ok"): ?>
      <p>登録完了</p>
    <?php elseif($status == "failed"): ?>
      <p>エラー：既に存在するユーザ名です。</p>
    <?php else: ?>
    <?php endif; ?>
    
      <form method="POST" action="register.php">
  <div class="input-group">
        <span class="input-group-addon">ユーザ名</span><input type="text" name="username" />
  </div>
  <div class="input-group">
        <span class="input-group-addon">パスワード</span><input type="text" name="password" />
  </div>
  		  <br>
        <input type="submit" value="登録" class="btn btn-default"/>
      </form>
      <br>
      	  <a href="login.php">ログイン画面に戻る</a>
  </body>
</html>