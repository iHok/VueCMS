<?php
require_once __DIR__.'/include/mysqli.php';
require_once __DIR__.'/include/sessioncheck.php';

    function CheckGet($name) {
        return $hoge = filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return filter_input(INPUT_POST, $name);
    }


    $hoge = filter_input(INPUT_GET, 'hoge');    ?>
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
  <p>ようこそ<?php echo htmlspecialchars($_SESSION["username"], ENT_QUOTES); ?>さん <a href="logout.php" class="btn btn-default">ログアウト</a></p>

<?php
$layout = CheckGet("layout");
echo(CheckGet("layout"));
if($layout === "post"){
	require __DIR__.'/main/post.php';
} elseif($layout === "delete"){
	require __DIR__.'/main/delete.php';
} else {
	require __DIR__.'/main/list.php';
}
?>
	</ul>
  <a href="index.php?layout=post">新規作成</a>
  </body>
</html>
