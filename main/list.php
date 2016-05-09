	<div id="main_list">
		<div v-for="item in items">
			<h2>{{ item.title }}</h2>
			<p>{{ item.message }}</p>
			<div>カテゴリ：{{ item.category }}　投稿日付：{{ item.created }}</div>
			<a href="?id={{ item.id }}">続きを読む</a><?php if (isset($_SESSION["name"])) {
			echo "　<a href ='?id={{ item.id }}&layout=post'>この記事を修正する</a>";
			echo "　<a href ='?id={{ item.id }}&layout=delete'>この記事を削除する</a>";
			}?>		</div>
	</div>

<script>
var mainlist = new Vue({
	  el: '#main_list',
	  data: {
	    items: [
<?php

$page = (checkGet("page")) ? ($_GET['page']-1) * 10 : 0;
//datasテーブルから日付の降順でデータを取得

		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
//		    $mysqli = new mysqli('localhost', 'root', '', 'testdb');
		    $mysqli->set_charset('utf8');
		    if(checkGet("category")){
		    	$categorySearch = checkGet("category");
		    	$rows = $mysqli->query("SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC LIMIT 10 OFFSET ". $page)->fetch_all(MYSQLI_ASSOC);
//		    	echo "SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC";
		    }else{
		    	$rows = $mysqli->query("SELECT * FROM datas ORDER BY created DESC LIMIT 10 OFFSET ". $page)->fetch_all(MYSQLI_ASSOC);
		    }
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
				{ id: '<?=h($row['id']);
				?>',name: '<?=h($row['name']);
				?>',title: '<?=h($row['title']);
				?>',message: '<?=str_replace(array("\r", "\n"), '',h($row['message']));
				?>',category: '<?=h($row['category']);
				?>',filename: '<?=h($row['filename']);
				?>',created: '<?=h($row['created']);
				?>' }<?php $no++;if($no !== $length){echo ",";}?>

<?php }
		} ?>

	    ]
	  }
	})
</script>

<?php

$paging = (checkGet("page")) ? ($_GET['page']) * 1 : 1;

		    if(checkGet("category")){
		    	$category_param = "&category=$categorySearch";
		    	$result = $mysqli->query("SELECT COUNT(*) AS page_count FROM datas WHERE category = '". $categorySearch."'");
		    }else{
		    	$category_param = null;
		    	$result = $mysqli->query("SELECT COUNT(*) AS page_count FROM datas");
		    }
		if($result){
			//1行ずつ取り出し
			$row = $result->fetch_object();
			//エスケープして表示
			$page_count = htmlspecialchars($row->page_count);
		}
		$nextpage = ($paging + 1);
		$prevpage = ($paging - 1);
		if(1 <$paging){
			echo "<a href='?page=".$prevpage.$category_param."'>前のページへ</a>　";
		}
		if($paging * 10 < $page_count){
			echo "<a href='?page=".$nextpage.$category_param."'>次のページへ</a>";
		}
		?>