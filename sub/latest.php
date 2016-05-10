		<ul class="submenu"  id="latest_list">
		<h3>最近投稿された5件</h3>
			<li v-for="latest in latests"><a href="?id={{ latest.id }}">{{ latest.title }}({{latest.created}})</a></li>
		</ul>

<script>
var latestlist = new Vue({
	el: '#latest_list',
	data: {
	latests: [
<?php

//datasテーブルから日付の降順でデータを取得

		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
//		    $mysqli->set_charset('utf8');
	    	$rows = $mysqli->query("select id, title ,created from datas order by created DESC limit 5");
		    $length = mysqli_num_rows($rows);     // 追加
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
				?>',title: '<?=h($row['title']);
				?>',created: '<?=substr(h($row['created']),0,10);
				?>' }<?php $no++;if($no !== $length){echo ",";}?>

		<?php }
		} ?>
	    ]
	  }
	})
</script>





