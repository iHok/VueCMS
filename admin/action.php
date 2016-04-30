<?php
require_once __DIR__.'/include/mysqli.php';
require_once __DIR__.'/include/sessioncheck.php';

    function CheckGet($name) {
        return $hoge = filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return filter_input(INPUT_POST, $name);
    }
$action = CheckGet("action");
if($action === "post"){
	require __DIR__.'/action/post.php';
} elseif($action === "delete"){
	require __DIR__.'/action/delete.php';
} else {
    header("Location:index.php");
}