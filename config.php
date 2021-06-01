<?php
    $GLOBALS['pic_upload'] = 'upload';
    $GLOBALS['pic_result'] = 'result';
    function init() {
        if (!is_dir($GLOBALS['pic_upload'])) mkdir($GLOBALS['pic_upload']);
        if (!is_dir($GLOBALS['pic_result'])) mkdir($GLOBALS['pic_result']);
    }
    function is_jpg() {
        return $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/jpg";
    }
    init();
    session_start();
    if (!array_key_exists("images",$_SESSION)) {
        $_SESSION['images'] = array();
    }
?>