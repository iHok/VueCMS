<div id="main">
<?php
if($layout === "post"){
	require __DIR__.'/main/post.php';
} elseif($layout === "delete"){
	require __DIR__.'/main/delete.php';
} elseif($layout === "category"){
	require __DIR__.'/main/category.php';
} elseif($layout === "list"){
	require __DIR__.'/main/list.php';
} elseif($layout === "post"){
	require __DIR__.'/main/post.php';
} elseif($layout === "login"){
	require __DIR__.'/main/login.php';
} elseif($layout === "logout"){
	require __DIR__.'/main/logout.php';
} elseif($layout === "register"){
	require __DIR__.'/main/register.php';
} elseif($id){
	require __DIR__.'/main/detail.php';
} else {
	require __DIR__.'/main/list.php';
}

?>

</div><!-- /#main -->
