<?php

$id = $_GET['id']; # $v1=30

$query = "DELETE FROM datas WHERE id=" .$id;
$stmt = $mysqli->prepare($query);
$stmt->execute();

$text = "戻る";
// リファラ値がなければ<a>タグを挿入しない
    header("Location:index.php");


?>