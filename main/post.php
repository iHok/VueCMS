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

<datalist id="category_value">
<?php
$result = $mysqli->query("select category from datas group by category");
if($result){

		//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$categoryList = htmlspecialchars($row->category);
		print("<option value='$categoryList'>");
	}
}
?>
</datalist>

<datalist id="name_value">
<?php
$result = $mysqli->query("select name from datas group by name");
if($result){

		//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$nameList = htmlspecialchars($row->name);
		print("<option value='$nameList'>");
	}
}
?>
</datalist>

<?php
if ( !isset($_GET['alert']) || $_GET['alert'] == "" ){

} else {
	if ( $_GET['alert'] === "update" ){
		echo "ID:".$id."の記事をアップデートしました。";
	} else	if ( $_GET['alert'] === "post" ){
		echo "以下の記事を新規投稿しました。";
	}
}
?>

  <form method="POST" action="index.php?<?php if($id)echo "id=$id&"; ?>layout=post&action=post">
        <div class="input-group">
            ID：<?php echo $id ?><br>
            投稿者名:<input name="name" type="text" class="form-control" value="<?php echo $_SESSION["name"] ?>" autocomplete="on" list="name_value"/><br>
            タイトル(必須)：<input name="title" type="text" class="form-control" value="<?php echo $title ?>" required/><br>
      本文<br>
           <textarea name="message" type="text" class="form-control" rows="4" cols="40"/><?php echo $message ?></textarea><br>
            カテゴリ(必須)：<input name="category" type="text" class="form-control" value="<?php echo $category ?>" autocomplete="on" list="category_value"  required/><br>
          <button type='submit' class="btn btn-default">送信</button>
        </div>
   </form>
