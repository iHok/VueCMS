<?php
require_once __DIR__.'/include/mysqli.php';
require_once __DIR__.'/include/sessioncheck.php';

    function CheckGet($name) {
        return $hoge = filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return filter_input(INPUT_POST, $name);
    }
	function h($str) {
	    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	}

	$action = CheckGet("action");
	if($action){
		require __DIR__.'/action.php';
	}
	?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>フリーHTML5/CSS3ホームページテンプレート NO.002</title>
<meta name="viewport" content="width=device-width">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/VueCMS/css/style.css">
<script type="text/javascript" src="/VueCMS/js/jquery.js"></script>
<script type="text/javascript" src="/VueCMS/js/script.js"></script>
<script type="text/javascript" src="/VueCMS/js/jquery.smoothscroll.js"></script>
<script type="text/javascript" src="/VueCMS/js/jquery.scrollshow.js"></script>
<script type="text/javascript" src="/VueCMS/js/jquery.rollover.js"></script>
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
	<h1><a href="index.html">vue.jsを使ったCMS</a></h1>
	<p>
	一覧などの表示にvue.jsを使ったCMSです。
	</p>
</header>

<nav>
	<ul>
		<li><a href="index.php">HOME</a></li>
<?php if (isset($_SESSION["name"])) ?><?php if (!isset($_SESSION["name"])){
	echo "<li><a href='?layout=register'>新規アカウント作成</a></li>";
	echo "<li><a href='?layout=login'>ログイン</a></li>";
} else {
		echo "<li><a href='?layout=post'>新規投稿</a></li>";
		echo "<li><a href='?layout=logout'>ログアウト</a></li>";
	}
?>
	</ul>
</nav>

<div id="contents">

<?php
    $layout = CheckGet("layout");
    $id = CheckGet("id");
	require __DIR__.'/layout.php';
?>

<?php
    $sub = CheckGet("sub");
	require __DIR__.'/sub.php';
?>

</div><!-- /#contents -->

<footer>
	<div class="footmenu">
		<ul>
			<li><a href="index.html">HOME</a></li>
<?php if (isset($_SESSION["name"])) ?><?php if (!isset($_SESSION["name"])){
		echo "<li><a href='?layout=login'>ログイン</a></li>";
	} else {
		echo "<li><a href='?layout=post'>新規投稿</a></li>";
		echo "<li><a href='?layout=logout'>ログアウト</a></li>";
	}
?>
		</ul>
	</div>
	<div class="copyright">Copyright &#169; 20XX - 20XX SITENAME All Rights Reserved.</div>
</footer>
<div class="totop"><a href="#"><img src="images/totop.png" alt="ページのトップへ戻る"></a></div><!-- /.totop -->

</body>
</html>