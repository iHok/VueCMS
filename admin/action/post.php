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
    header("Location:". $_SERVER['HTTP_REFERER']."&id=".$mysqli->insert_id);
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

/*
if ( !isset($_POST['message']) || $_POST['message'] == "" ){
	echo "if";
} else{
	$query = "UPDATE datas SET message='".$_POST['message']."' WHERE id=" .$id;
	echo $query;
	$stmt = $mysqli->prepare($query);
	$stmt->execute();
	echo "else";
}
if ( !isset($_POST['category']) || $_POST['category'] == "" ){
	echo "if";
} else{
	$query2 = "UPDATE datas SET category='".$_POST['category']."' WHERE id=" .$id;
	echo $query2;
	$stmt = $mysqli->prepare($query2);
	$stmt->execute();
	echo "else";
}
 *
 */