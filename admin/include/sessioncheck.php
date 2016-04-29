<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["username"])) {
  header("Location: logout.php");
  exit;
}
?>
