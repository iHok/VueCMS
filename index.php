<?php
require_once __DIR__.'/admin/include/mysqli.php';
require_once __DIR__.'/admin/include/sessioncheck.php';

    function CheckGet($name) {
        return $hoge = filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return filter_input(INPUT_POST, $name);
    }
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>フリーHTML5/CSS3ホームページテンプレート NO.002</title>
<meta name="viewport" content="width=device-width">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.scrollshow.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script>
$(function($){
	$('html').smoothscroll({easing : 'swing', speed : 1000, margintop : 10});
	$('.totop').scrollshow({position : 500});
});
</script>
<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/css3-mediaqueries.js"></script>
<![endif]-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.min.js"></script>
<style>
[v-cloak] {
    display: none;
}
</style>
</head>
<body>
<header>
	<h1><a href="index.html">HTML5/CSS3デザインテンプレート</a></h1>
	<div class="tel"><span>&#9742;012-345-678</span></div>
	<p>
	この箇所はホームページの説明文など記載するのに最適です。だいたい1行程度で収めるのがよいかと思います。
	</p>
</header>

<nav>
	<ul>
		<li><a href="index.html">HOME</a></li>
		<li><a href="index.html">メニュー・料金</a></li>
		<li><a href="index.html">ご予約</a></li>
		<li><a href="index.html">ブログ</a></li>
		<li><a href="index.html">お問い合わせ</a></li>
		<li><a href="sample.html">SAMPLE</a></li>
	</ul>
</nav>

<div id="contents">
	<div id="subnav">
		<h3>下層サブメニュー</h3>
		<ul>
			<li><a href="index.html">リスト１</a></li>
			<li><a href="index.html">リスト２</a></li>
			<li><a href="index.html">リスト３</a></li>
			<li><a href="index.html">リスト４</a></li>
			<li><a href="index.html">リスト５</a></li>
		</ul>
	</div><!-- /#subnav -->

	<div id="main">
<?php
    $layout = CheckGet("layout");
    if($layout) {
    	$flag = false;
    	require __DIR__.'/layout.php';
    }
?>

<div id="example-1">
	<div v-for="item in items">
		<h2>{{ item.title }}</h2>
		<div>カテゴリ：{{ item.category }}　投稿日付：{{ item.created }}</div>
		<p>{{ item.message }}</p>
		<a href="?post={{ item.id }}">続きを読む</a>
	</div>
</div>
</div><!-- /#main -->
	<div id="sub">
		<ul class="submenu">
		<h3>見出しh3タグ</h3>
			<li><a href="index.html">aaaa</a></li>
			<li><a href="index.html">aaaa</a></li>
			<li><a href="index.html">aaaa</a></li>
			<li><a href="index.html">aaaa</a></li>
			<li><a href="index.html">aaaa</a></li>
			<li><a href="index.html">aaaa</a></li>
			<li><a href="index.html">aaaa</a></li>
			<li><a href="index.html">aaaa</a></li>
			<li><a href="index.html">aaaa</a></li>
		</ul>
	</div><!-- /#sub -->
</div><!-- /#contents -->

<footer>
	<div class="footmenu">
		<ul>
			<li><a href="index.html">HOME</a></li>
			<li><a href="index.html">メニュー・料金</a></li>
			<li><a href="index.html">ご予約</a></li>
			<li><a href="index.html">ブログ</a></li>
			<li><a href="index.html">お問い合わせ</a></li>
			<li><a href="sample.html">SAMPLE</a></li>
		</ul>
	</div>
	<div class="copyright">Copyright &#169; 20XX - 20XX SITENAME All Rights Reserved.</div>
</footer>

<div class="totop"><a href="#"><img src="images/totop.png" alt="ページのトップへ戻る"></a></div><!-- /.totop -->

<script>
var example1 = new Vue({
	  el: '#example-1',
	  data: {
	    items: [
<?php

$page = (checkGet("page")) ? ($_GET['page']-1) * 20 : 0;
//datasテーブルから日付の降順でデータを取得

		function h($str) {
		    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
		}
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
//		    $mysqli = new mysqli('localhost', 'root', '', 'testdb');
		    $mysqli->set_charset('utf8');
		    if(checkGet("category")){
		    	$categorySearch = checkGet("category");
		    	$rows = $mysqli->query("SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC LIMIT 20 OFFSET ". $page)->fetch_all(MYSQLI_ASSOC);
		    	echo "SELECT * FROM datas WHERE category = '". $categorySearch ."' ORDER BY created DESC";
		    }else{
		    	$rows = $mysqli->query("SELECT * FROM datas ORDER BY created DESC LIMIT 45 OFFSET ". $page)->fetch_all(MYSQLI_ASSOC);
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


</body>
</html>