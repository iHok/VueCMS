<?php
require_once __DIR__.'/include/mysqli.php';
require_once __DIR__.'/include/sessioncheck.php';

    function CheckGet($name) {
        return (string)filter_input(INPUT_GET, $name);
    }
    function CheckPost($name) {
        return (string)filter_input(INPUT_POST, $name);
    }

    $action = CheckGet("action");
    if($action){
    	require __DIR__.'/action.php';
    } else {
    	require __DIR__.'/layout.php';
    }