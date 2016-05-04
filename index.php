<!DOCTYPE html>
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

<?php
require_once __DIR__.'/admin/include/mysqli.php';

    function CheckGet($name) {
        return $hoge = filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return filter_input(INPUT_POST, $name);
    }
?>

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
    } else{
?>
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
		<h2>h2タグ(2017/10/10)</h2>
		<p>本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文</p>
		<a href="#">続きを読む</a>
	</div><!-- /#main -->
	<div id="sub">
		<h3>見出しh3タグ</h3>
		<ul class="submenu" id="example-1">
			<li v-for="item in items"><a href="index.html">{{ item.message }}</a></li>
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
		function h($str) {
		    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
		}
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
//		    $mysqli = new mysqli('localhost', 'root', '', 'testdb');
		    $mysqli->set_charset('utf8');
		    $rows = $mysqli->query('SELECT * FROM datas ORDER BY created DESC')->fetch_all(MYSQLI_ASSOC);
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
		{ message: '<?=h($row['name'])?>' }<?php $no++;if($no !== $length){echo ",";}?>
			<?php }
		} ?>

	    ]
	  }
	})
</script>


</body>
</html>