<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>サンプルアプリケーション</title>
<!--   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
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
if($layout === "post"){
	require __DIR__.'/main/post.php';
} elseif($layout === "delete"){
	require __DIR__.'/main/delete.php';
} elseif($layout === "category"){
	require __DIR__.'/main/category.php';
} elseif($layout === "list"){
	require __DIR__.'/main/list.php';
} else {
	require __DIR__.'/main/list.php';
}
?>

<ul>
<li>  <a href="index.php?layout=post">新規作成</a></li>
<!--   <a href="index.php?layout=category">カテゴリ検索</a> -->
<li>  <a href="index.php?layout=category">カテゴリ登録</a></li>
 <!--  <a href="index.php?layout=category">カテゴリ編集</a> -->
<!--   <a href="index.php?layout=post">記事検索</a> -->
<!--   <a href="index.php?layout=post">記事登録</a> -->
 </ul>
  記事編集はリストから

  </body>
</html>