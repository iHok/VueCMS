  <h1>ログイン画面</h1>
  <!-- $_SERVER['PHP_SELF']はXSSの危険性があるので、actionは空にしておく -->
  <!--<form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">-->
  <form id="loginForm" name="loginForm" action="login.php" method="POST">
  <fieldset>
  <?php if(!empty($errorMessage))echo $errorMessage; ?>
  <div class="input-group">
    <span class="input-group-addon">ユーザ名</span><input type="text" id="name" name="name" value="test">
  </div>
  <div class="input-group">
  <span class="input-group-addon">パスワード</span><input type="password" id="password" name="password" value="test">
  </div>
  <br>
  <input class="btn btn-default" type="submit" id="login" name="login" value="ログイン">
  </fieldset>
  </form>
