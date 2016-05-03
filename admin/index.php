<?php
require_once __DIR__.'/include/mysqli.php';
require_once __DIR__.'/include/sessioncheck.php';

	function CheckGet($name) {
        return (string)filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return (string)filter_input(INPUT_POST, $name);
    }

	$flag = true;
    $action = CheckGet("action");
    if($action){
    	$flag = false;
    	require __DIR__.'/action.php';
    }

    $layout = CheckGet("layout");
    if($layout) {
    	$flag = false;
    	require __DIR__.'/layout.php';
    }

    if($flag) {
	$layout = null;
    	require __DIR__.'/layout.php';
    }

    $mysqli->close();
