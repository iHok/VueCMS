<table border>
<tr><th>id</th><th>name</th><th>$message</th><th>category</th><th>created</th><th>削除</th></tr>

<?php

//datasテーブルから日付の降順でデータを取得
if(checkGet("category")){
	$categorySearch = checkGet("category");
	$result = $mysqli->query("SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC");
	echo "SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC";
}else{
	$result = $mysqli->query("SELECT * FROM datas ORDER BY created DESC");
}
if($result){
	//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$id = htmlspecialchars($row->id);
		$name = htmlspecialchars($row->name);
		$message = htmlspecialchars($row->message);
		$category = htmlspecialchars($row->category);
		$created = htmlspecialchars($row->created);
		print("<tr>
	<td><a href='index.php?id=$id&layout=post'>$id</a></td>
	<td>$name</td>
	<td>$category</td>
	<td>$message</td>
	<td>$created</td>
	<td><a href='index.php?id=$id&layout=delete'>削除</a></td>
	</tr>
	");}
}
?>


</table>



