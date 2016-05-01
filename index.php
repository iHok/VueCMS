<?php
require_once __DIR__.'/admin/include/mysqli.php';

    function CheckGet($name) {
        return $hoge = filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return filter_input(INPUT_POST, $name);
    }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.min.js"></script>
    </head>
    <body>
<style>
[v-cloak] {
    display: none;
}
</style>

<ul id="example-1">
  <li v-for="item in items">
    {{ item.message }}
  </li>
</ul>

<script src="vue.js"></script>
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
		?>
		<?php if (isset($error)): ?>
		<?=h($error)?>
		<?php else: ?>
		<?php foreach ($rows as $row): ?>
		{ message: '<?=h($row['name'])?>' }<?php $no++;if($no !== $length){echo ",";}?>

		<?php endforeach; ?>
		<?php endif; ?>

	    ]
	  }
	})
</script>
    </body>
</html>
