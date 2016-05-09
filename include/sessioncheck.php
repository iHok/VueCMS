<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["name"])) {
//  header("Location: logout.php");
//  exit;
}
?>
