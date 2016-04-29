<?php

//datasテーブルから日付の降順でデータを取得
$result = $mysqli->query("SELECT * FROM datas ORDER BY created DESC");
if($result){
	//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$id = htmlspecialchars($row->id);
		$name = htmlspecialchars($row->name);
		$message = htmlspecialchars($row->message);
		$created = htmlspecialchars($row->created);
		print("<li class='list-group-item'><a href='post.php?id=$id'>$id</a>: $name : $message ($created) <a href='delete_post.php?id=$id'>削除</a></li>");
	}
}
?>
