<?php
require_once __DIR__.'/include/mysqli.php';
require_once __DIR__.'/include/sessioncheck.php';

if($action === "post"){
	require __DIR__.'/action/post.php';
} elseif($action === "delete"){
	require __DIR__.'/action/delete.php';
} else {
    header("Location:index.php");
}