<?php
    include_once "config.php";
    if (!array_key_exists('images',$_SESSION)) $_SESSION['images'] = array();
    $result = array(
        'status'=>500,
    );
    if (!is_jpg()) {
        $result['msg'] = "文件类型错误";
    }
    else {
        $filepath = $_FILES["file"]["tmp_name"];
        $filemd5 = md5_file($filepath);
        copy($filepath,$GLOBALS['pic_upload'].'/'.$filemd5.'.jpg');
        $_SESSION['images'][$_FILES["file"]["name"]] = $filemd5.'.jpg';
        $result['status'] = 200;
    }
    echo json_encode($result);
?>