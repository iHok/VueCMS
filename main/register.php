<?php

//ハッシュ化に使用する定数
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$status = "none";

if(!empty($_POST["name"]) && !empty($_POST["password"])){
  //パスワードはハッシュ化する
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  //ユーザ入力を使用するのでプリペアドステートメントを使用
  $stmt = $mysqli->prepare("INSERT INTO users (name,password) VALUES (?, ?)");
  $stmt->bind_param('ss', $_POST["name"], $password);

  if($stmt->execute())
    $status = "ok";
  else
    //既に存在するユーザ名だった場合INSERTに失敗する
    $status = "failed";
}

?>

  <body>
    <h1>新規アカウント作成</h1>
    <?php if($status == "ok"): ?>
      <p>登録完了</p>
    <?php elseif($status == "failed"): ?>
      <p>エラー：既に存在するユーザ名です。</p>
    <?php else: ?>
    <?php endif; ?>

  <form method="POST" action="index.php?layout=register">
  <div class="input-group">
        <span class="input-group-addon">ユーザ名</span><input type="text" name="name" />
  </div>
  <div class="input-group">
        <span class="input-group-addon">パスワード</span><input type="text" name="password" />
  </div>
  		  <br>
        <input type="submit" value="登録" class="btn btn-default"/>
   </form>
  </body>
</html>