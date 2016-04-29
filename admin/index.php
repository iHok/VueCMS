<?php
require_once __DIR__.'/include/mysqli.php';
require_once __DIR__.'/include/sessioncheck.php';
    function CheckGet($name) {
        return $hoge = filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return filter_input(INPUT_POST, 'hoge');
    }


    $hoge = filter_input(INPUT_GET, 'hoge');    ?>
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
  <p>ようこそ<?php echo htmlspecialchars($_SESSION["username"], ENT_QUOTES); ?>さん</p>

<?php
require __DIR__.'/main.php';
?>
	</ul>
        <form method="POST" action="main.php">
        <div  class="input-group">
          <input name="message" type="text" class="form-control"/>
        <span class="input-group-btn">
          <button type='submit' class="btn btn-default">送信</button>
        </span>
        </div>
</div>
        </form>
  <a href="post.php">新規作成</a>
  </body>
</html>
<?php
include_once 'object/robot.php';
$a = new Robot('ロボ太郎');
$b = new Robot('ロボ次郎');

echo $a->getName(); // ロボ太郎
echo $b->getName(); // ロボ次郎
echo
$mysqli->close();
?>