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
	      { message: 'Foo' },
	      <?php

	    			//datasテーブルから日付の降順でデータを取得
	    			$result = $mysqli->query("SELECT * FROM datas ORDER BY created DESC");
	    			if($result){
	    				//1行ずつ取り出し
	    				while($row = $result->fetch_object()){
	    					//エスケープして表示
	    					$id = htmlspecialchars($row->id);
	    					$name = htmlspecialchars($row->name);
	    					$message = nl2br(htmlspecialchars($row->message));
	    					$category = htmlspecialchars($row->category);
	    					$created = htmlspecialchars($row->created);
	    					print("{ message: '$name' },");
//	    					print("<li class='list-group-item'><a href='index.php?id=$id&layout=post'>$id</a>: $name ： $category ：$message / $created <a href='index.php?id=$id&layout=delete'>削除</a></li>");
	    				}
	    			}
	    			?>
	      { message: 'Ba<br>r' }

	    ]
	  }
	})
</script>

<?php echo $message ?>
    </body>
</html>