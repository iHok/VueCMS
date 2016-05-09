<?php
if ( !isset($_GET['id']) || $_GET['id'] == "" ){
$id = null; # $v1=30
$name = null;//$_SESSION["name"];
$title = null;
$message = null;
$category = null;
$filename = null;
} else{
$id = $_GET['id']; # $v1=30
//datasテーブルから日付の降順でデータを取得
$result = $mysqli->query("SELECT * FROM datas WHERE id=" . $id);
if($result){
    $row = $result->fetch_object();
    //エスケープして表示
    $id = htmlspecialchars($row->id);
    $name = htmlspecialchars($row->name);
    $title = htmlspecialchars($row->title);
    $message = htmlspecialchars($row->message);
    $category = htmlspecialchars($row->category);
    $filename = htmlspecialchars($row->filename);
    $created = htmlspecialchars($row->created);
 } else{
    echo "error";
}
}
?>

	<div>
		<h2><?php echo $title ?></h2>
		<p><?php echo $message ?></p>
		<div>カテゴリ：<?php echo $category ?>　投稿者：<?php echo $name ?>　投稿日付：<?php echo $created ?></div>
<?php echo "　<a href ='?id=$id&layout=post'>この記事を修正する</a>"; ?>
<?php echo "　<a href ='?id=$id&layout=delete'>この記事を削除する</a>"; ?>
	</div>
