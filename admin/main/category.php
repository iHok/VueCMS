<?php

//datasテーブルから日付の降順でデータを取得
$result = $mysqli->query("select category from datas");
$categoryArray = array();
if($result){
	//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		array_push($categoryArray,htmlspecialchars($row->category));
		print("category / <br>");
	}
	$categoryArray = array_count_values($categoryArray);
}
	ksort($categoryArray);
	print_r($categoryArray);
	echo $categoryArray['test'];
?>
category
<ul class="list-group">
	</ul>
  <form method="POST" action="index.php?id=<?php echo $id ?>&action=post">
        <div  class="input-group">
        <span class="input-group-btn">
          <button type='submit' class="btn btn-default">送信</button>
        </span>
        </div>
</div>
        </form>
<a href="index.php">戻る</a>
select ategory, count(ategory) from datas group by datas