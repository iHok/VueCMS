<?php
if ( !isset($_GET['id']) || $_GET['id'] == "" ){
$id = null; # $v1=30
$message = null;
$category = null;
echo "if_id";
} else{
$id = $_GET['id']; # $v1=30
echo "else_id";
//datasテーブルから日付の降順でデータを取得
$result = $mysqli->query("SELECT * FROM datas WHERE id=" . $id);
if($result){
    $row = $result->fetch_object();
    //エスケープして表示
    $name = htmlspecialchars($row->name);
    $message = htmlspecialchars($row->message);
    $category = htmlspecialchars($row->category);
    $created = htmlspecialchars($row->created);
 } else{
    echo "error";
}
}
?>


<ul class="list-group">
	</ul>
  <form method="POST" action="action.php?id=<?php echo $id ?>&action=post">
        <div  class="input-group">
            カテゴリ：<input name="category" type="text" class="form-control" value="<?php echo $category ?>"/><br>
           <textarea name="message" type="text" class="form-control" rows="4" cols="40"/><?php echo $message ?></textarea><br>
        <span class="input-group-btn">
          <button type='submit' class="btn btn-default">送信</button>
        </span>
        </div>
</div>
        </form>
<a href="index.php">戻る</a>
