<?php
$result = $mysqli->query("select category, count(category) AS countCategory from datas group by category");
if($result){

		//1行ずつ取り出し
	while($row = $result->fetch_object()){
		//エスケープして表示
		$category = htmlspecialchars($row->category);
		$countCategory = htmlspecialchars($row->countCategory);
//		print("$category / $countCategory<br>");
	}
}
?>

		<ul class="submenu"  id="category_list">
		<h3>カテゴリ</h3>
			<li v-for="category in categorys"><a href="?category={{ category.categoryName }}">{{ category.categoryName }}({{ category.countCategory }})</a></li>
		</ul>

<script>
var categorylist = new Vue({
	  el: '#category_list',
	  data: {
	    categorys: [
<?php

//datasテーブルから日付の降順でデータを取得

		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
		    $mysqli->set_charset('utf8');
	    	$rows = $mysqli->query("select category, count(category) AS countCategory from datas group by category")->fetch_all(MYSQLI_ASSOC);
		    $length = count($rows);     // 追加
		    $no = 0;    // 追加

		} catch (mysqli_sql_exception $e) {
		    $error = $e->getMessage();
		}
		//header('Content-Type: text/html; charset=utf-8');
		if (isset($error)){
			h($error);
		}else{
			foreach ($rows as $row){ ?>
				{ categoryName: '<?=h($row['category']);
				?>',countCategory: '<?=h($row['countCategory']);
				?>' }<?php $no++;if($no !== $length){echo ",";}?>

		<?php }
		} ?>
	    ]
	  }
	})
</script>