<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>サンプルアプリケーション</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
  <h1>ログイン中</h1>
  <!-- ユーザIDにHTMLタグが含まれても良いようにエスケープする -->
  <ul>
  <a href="logout.php" class="btn btn-default">ログアウト</a>
  </ul>
	<ul class="list-group">
  <p>ようこそ<?php echo htmlspecialchars($_SESSION["name"], ENT_QUOTES); ?>さん</p>
<?php
$layout = CheckGet("layout");
if($layout === "post"){
	require __DIR__.'/main/post.php';
} elseif($layout === "delete"){
	require __DIR__.'/main/delete.php';
} else {
	require __DIR__.'/main/list.php';
}
?>

  <a href="index.php?layout=post">新規作成</a>
  </body>
</html>
<?php
$mysqli->close();
?>