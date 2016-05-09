<?php
if ( !isset($_GET['id']) || $_GET['id'] == "" ){
	//プリペアドステートメントを作成　ユーザ入力を使用する箇所は?にしておく
	$query = "INSERT INTO datas (name , title, message , category) VALUES (?,?, ?, ?)";
	$stmt = $mysqli->prepare($query);
	//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
	//?の位置に値を割り当てる
	$stmt->bind_param('ssss', $_POST["name"], $_POST["title"], $_POST["message"], $_POST["category"]);
	//実行
	$stmt->execute();
    header("Location:index.php?id=".$mysqli->insert_id."&layout=post");
} else{
	$id = $_GET['id']; # $v1=30
	$query = "UPDATE datas SET name = ? , title = ?, message = ? , category = ? WHERE id=" .$id;
	echo $query;
	$stmt = $mysqli->prepare($query);
	//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
	//?の位置に値を割り当てる
	$stmt->bind_param('ssss', $_POST["name"], $_POST["title"], $_POST["message"], $_POST["category"]);
	//実行
	$stmt->execute();
	echo "actelse";
	header("Location:index.php?id=".$id."&layout=post&alert=update");
}
