<?php
require_once __DIR__.'/include/password.php';
require_once __DIR__.'/include/mysqli.php';

$id = $_GET['id']; # $v1=30
?>

<?php
$query = "DELETE FROM datas WHERE id=" .$id;
$stmt = $mysqli->prepare($query);
$stmt->execute();
?>


<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>サンプルアプリケーション</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
  <h1>編集中</h1>
  <!-- ユーザIDにHTMLタグが含まれても良いようにエスケープする -->
  <ul>
  <a href="logout.php" class="btn btn-default">ログアウト</a>
  </ul>
	<ul class="list-group">
    <br>
    削除しました。<br>
	</ul>
</div>
        </form>
<?php
$text = "戻る";
// リファラ値がなければ<a>タグを挿入しない
if (empty($_SERVER['HTTP_REFERER'])) {  
//  echo $text;
}
// リファラ値があれば<a>タグ内へ
else {
  echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">' . $text . "</a>";
}
?>
</body>
</html>
<?php
$mysqli->close();
?>