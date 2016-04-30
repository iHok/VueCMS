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
		$category = htmlspecialchars($row->category);
		$created = htmlspecialchars($row->created);
		print("<li class='list-group-item'><a href='index.php?id=$id&layout=post'>$id</a>: $name ： $category ：$message / $created <a href='index.php?id=$id&layout=delete'>削除</a></li>");
	}
}