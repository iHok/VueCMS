<?php

//datasテーブルから日付の降順でデータを取得
$result = $mysqli->query("SELECT category FROM datas ORDER BY created DESC");
if($result){
	//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$id = htmlspecialchars($row->id);
		$name = htmlspecialchars($row->name);
		$message = htmlspecialchars($row->message);
		$category = htmlspecialchars($row->category);
		$created = htmlspecialchars($row->created);
		print("<li class='list-group-item'><a href='index.php?id=$id&layout=post'>$id</a>: $name ： $category ：$message / $created <a href='index.php?id=$id&layout=delete'>削除</a></li>");
	}
}

<?php

if ( !isset($_GET['id']) || $_GET['id'] == "" ){
	//プリペアドステートメントを作成　ユーザ入力を使用する箇所は?にしておく
	$query = "INSERT INTO datas (name , title, message , category,filename) VALUES (?,?, ?, ?, ?)";
	$stmt = $mysqli->prepare($query);
	//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
	//?の位置に値を割り当てる
	$stmt->bind_param('sssss', $_POST["name"], $_POST["title"], $_POST["message"], $_POST["category"], $_POST["filename"]);
	//実行
	$stmt->execute();
	header("Location:". $_SERVER['HTTP_REFERER']."?id=".$mysqli->insert_id);
} else{
	$id = $_GET['id']; # $v1=30
	$query = "UPDATE datas SET name = ? , title = ?, message = ? , category = ?,filename = ? WHERE id=" .$id;
	echo $query;
	$stmt = $mysqli->prepare($query);
	//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
	//?の位置に値を割り当てる
	$stmt->bind_param('sssss', $_POST["name"], $_POST["title"], $_POST["message"], $_POST["category"], $_POST["filename"]);
	//実行
	$stmt->execute();
	header("Location:". $_SERVER['HTTP_REFERER']."&alert=update");
}
?>
category
<ul class="list-group">
	</ul>
  <form method="POST" action="index.php?id=<?php echo $id ?>&action=post">
        <div  class="input-group">
            ID：<?php echo $id ?><br>
            名前：<input name="name" type="text" class="form-control" value="<?php echo $name ?>"/><br>
            タイトル：<input name="title" type="text" class="form-control" value="<?php echo $title ?>"/><br>
           <textarea name="message" type="text" class="form-control" rows="4" cols="40"/><?php echo $message ?></textarea><br>
            カテゴリ：<input name="category" type="text" class="form-control" value="<?php echo $category ?>"/><br>
            ファイル名：<input name="filename" type="text" class="form-control" value="<?php echo $filename ?>"/><br>
        <span class="input-group-btn">
          <button type='submit' class="btn btn-default">送信</button>
        </span>
        </div>
</div>
        </form>
<a href="index.php">戻る</a>
