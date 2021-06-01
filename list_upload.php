<?php
    include_once "config.php";
    $result = array('list'=>array(array("文件名","状态")));
    foreach ($_SESSION['images'] as $filename => $hashname) {
        $result_path = $GLOBALS['pic_result'].'/'.$hashname;
        $is_exist = file_exists($result_path);
        $filesize = $is_exist ? filesize($result_path) : 0;
        $status = $filesize ? "完成" : ($is_exist ? "错误" : "等待中");
        array_push($result['list'],array($filesize?"<a href=\"/".$result_path."\">".$filename."</a>":$filename,$status));
    }
    echo json_encode($result);
?>
