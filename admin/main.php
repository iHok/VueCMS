<?php
$main = CheckGet("main");
echo(CheckGet("main"));
if($main == "edit"){
	echo "edit画面";
} else {
	require_once __DIR__.'/main/list.php';
}
?>
