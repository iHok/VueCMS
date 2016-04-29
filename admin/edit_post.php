<?php
require_once __DIR__.'/include/password.php';
require_once __DIR__.'/include/mysqli.php';

if ( !isset($_GET['id']) || $_GET['id'] == "" ){
echo "if_id";
} else{
$id = $_GET['id']; # $v1=30
echo "else_id";
}
?>


<?php
if ( !isset($_POST['message']) || $_POST['message'] == "" ){
echo "if";
} else{
$query = "UPDATE datas SET message='".$_POST['message']."' WHERE id=" .$id;
echo $query;
$stmt = $mysqli->prepare($query);
$stmt->execute();
echo "else";
}
?>


<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>サンプルアプリケーション</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
  <h1中編集中</h1>
  <!-- ユーザIDにHTMLタグが含まれても良いようにエスケープする -->
  <ul>
  <a href="logout.php" class="btn btn-default">ログアウト</a>
  </ul>
	<ul class="list-group">
    <?php

//datasテーブルから日付の降順でデータを取得
$result = $mysqli->query("SELECT * FROM datas WHERE id=" . $id);
if($result){
    $row = $result->fetch_object();
    //エスケープして表示
    $name = htmlspecialchars($row->name);
    $message = htmlspecialchars($row->message);
    $created = htmlspecialchars($row->created);
 } else{
    echo "error";
}
    ?>
	</ul>
        <form method="POST" action="edit_post.php?id=<?php echo $id ?>">
        <div  class="input-group">
          <input name="message" type="text" class="form-control" value="<?php echo $message ?>"/>
        <span class="input-group-btn">
          <button type='submit' class="btn btn-default">送信</button>
        </span>
        </div>
</div>
        </form>
<a href="main.php">戻る</a>
    </body>
</html>
		<?php
$mysqli->close();
?>