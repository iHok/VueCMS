<?php
if($layout === "post"){
	require __DIR__.'/main/post.php';
} elseif($layout === "delete"){
	require __DIR__.'/main/delete.php';
} elseif($layout === "category"){
	require __DIR__.'/main/category.php';
} elseif($layout === "list"){
	require __DIR__.'/main/list.php';
} else {
	require __DIR__.'/main/post.php';
}

echo("testlayoutphp");;
