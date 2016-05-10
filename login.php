<?php
require_once __DIR__.'/include/mysqli.php';
require_once __DIR__.'/include/sessioncheck.php';
// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
  // １．ユーザIDの入力チェック
  if (empty($_POST["name"])) {
    $errorMessage = "ユーザIDが未入力です。";
  } else if (empty($_POST["password"])) {
    $errorMessage = "パスワードが未入力です。";
  }

  // ２．ユーザIDとパスワードが入力されていたら認証する
  if (!empty($_POST["name"]) && !empty($_POST["password"])) {
    // mysqlへの接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);
    if ($mysqli->connect_errno) {
      print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
      exit();
    }

    // データベースの選択
    $mysqli->select_db(DB_NAME);

    // 入力値のサニタイズ
    $name = $mysqli->real_escape_string($_POST["name"]);
    // クエリの実行
    $query = "SELECT * FROM users WHERE name = '" . $name . "'";
    $result = $mysqli->query($query);
    if (!$result) {
      print('クエリーが失敗しました。' . $mysqli->error);
      $mysqli->close();
      exit();
    }

    while ($row = $result->fetch_assoc()) {
      // パスワード(暗号化済み）の取り出し
      $db_hashed_pwd = $row['password'];
    }
    // データベースの切断
    $mysqli->close();

    // ３．画面から入力されたパスワードとデータベースから取得したパスワードのハッシュを比較します。
    //if ($_POST["password"] == $pw) {
    if (password_verify($_POST["password"], $db_hashed_pwd)) {
      // ４．認証成功なら、セッションIDを新規に発行する
      session_regenerate_id(true);
      $_SESSION["name"] = $_POST["name"];
      header("Location: index.php");
      exit;
    }
    else {
      // 認証失敗
      $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
    }
  } else {
    // 未入力なら何もしない
  }
}

?>