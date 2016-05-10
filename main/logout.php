<?php

if (isset($_SESSION["name"])) {
  $errorMessage = "ログアウトしました。";
}
else {
  $errorMessage = "セッションがタイムアウトしました。";
}
// セッション変数のクリア
$_SESSION = array();
@session_destroy();
?>

  <h1>ログアウト画面</h1>
  <div><?php echo $errorMessage; ?></div>
  <a href="index.php">トップページに戻る</a>