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
echo "else_id";
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

<datalist id="test">
<?php
$result = $mysqli->query("select category, count(category) AS countCategory from datas group by category");
if($result){

		//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$categoryList = htmlspecialchars($row->category);
		$countCategory = htmlspecialchars($row->countCategory);
		print("<option value='$categoryList'>");
	}
}
	echo "test";
?>
</datalist>

<?php
if ( !isset($_GET['alert']) || $_GET['alert'] == "" ){
	echo "!issetのelse";
} else {
	if ( $_GET['alert'] === "update" ){
		echo $id."の記事をアップデートしました。";
	} else {
		echo "alertのelse";
	}
}
?>

  <form method="POST" action="index.php?id=<?php echo $id ?>&action=post">
        <div  class="input-group">
            ID：<?php echo $id ?><br>
            名前：<input name="name" type="text" class="form-control" value="<?php echo $name ?>"/><br>
            タイトル：<input name="title" type="text" class="form-control" value="<?php echo $title ?>"/><br>
           <textarea name="message" type="text" class="form-control" rows="4" cols="40"/><?php echo $message ?></textarea><br>
            カテゴリ：<input name="category" type="text" class="form-control" value="<?php echo $category ?>" autocomplete="on" list="test"/><br>
            ファイル名：<input name="filename" type="text" class="form-control" value="<?php echo $filename ?>"/><br>
        <span class="input-group-btn">
          <button type='submit' class="btn btn-default">送信</button>
        </span>
        </div>
        </form>


  <form method="POST" action="index.php?id=2&action=post">
		<h2 id="sample">タイトル<input name="title" type="text" class="form-control" value=""/></h2>
            カテゴリ：<input name="category" type="text" class="form-control" value="" autocomplete="on" list="test"/><br>		<p>
           <textarea name="message" type="text" class="form-control" rows="4" style="width:100%;"/></textarea><br>
		</p>
        <div  class="input-group">
            名前：<input name="name" type="text" class="form-control" value=""><br>

            ファイル名：<input name="filename" type="text" class="form-control" value=""/><br>
        <span class="input-group-btn">
          <button type='submit' class="btn btn-default">送信</button>
        </span>
        </div>
  </form>
