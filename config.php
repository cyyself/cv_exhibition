<?php
    $GLOBALS['pic_upload'] = 'upload';
    $GLOBALS['pic_result'] = 'result';
    function init() {
        if (!is_dir($GLOBALS['pic_upload'])) mkdir($GLOBALS['pic_upload']);
        //if (!is_dir($GLOBALS['pic_result'])) mkdir($GLOBALS['pic_result']);
    }
    function is_jpg() {
        return $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/jpg";
    }
    init();
    session_start();
    if (!array_key_exists("images",$_SESSION)) {
        $_SESSION['images'] = array(
            "T2019_264roi1_27.jpg"=>'95715915d9c10f02183bc7bf93215d47.jpg',
            "T2019_639roi3_5.jpg"=>'51e825dffab8c9ad6015245d2d38890b.jpg',
            "T2019_668roi3_8.jpg"=>'e9040ac796930650c763c1fb48aafcc4.jpg',
            "T2019_9roi1_4.jpg"=>'e41d12f03d72e6bdf708418781c7791f.jpg'
        );
    }
?>