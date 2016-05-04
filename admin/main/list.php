<table border>
<tr><th>id</th><th>name</th><th>title</th><th>message</th><th>category</th><th>filename</th><th>投稿日</th><th>削除</th></tr>

<?php

$page = (checkGet("page")) ? ($_GET['page']-1) * 20 : 0;
//datasテーブルから日付の降順でデータを取得

if(checkGet("category")){
	$categorySearch = checkGet("category");
	$result = $mysqli->query("SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC LIMIT 20 OFFSET ". $page);
	echo "SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC";
}else{
	$result = $mysqli->query("SELECT * FROM datas ORDER BY created DESC LIMIT 20 OFFSET ". $page);
}
if($result){
	//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$id = htmlspecialchars($row->id);
		$name = htmlspecialchars($row->name);
		$title = htmlspecialchars($row->title);
		$message = htmlspecialchars($row->message);
		$category = htmlspecialchars($row->category);
		$filename = htmlspecialchars($row->filename);
		$created = htmlspecialchars($row->created);
		print("<tr>
	<td><a href='index.php?id=$id&layout=post'>$id</a></td>
	<td>$name</td>
	<td>$title</td>
	<td>$message</td>
	<td>$category</td>
	<td>$filename</td>
	<td>$created</td>
	<td><a href='index.php?id=$id&layout=delete'>削除</a></td>
	</tr>
	");}
}
?>


</table>



