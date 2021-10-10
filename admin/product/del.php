<?php
    require_once '../../templates/admin/inc/header.php';
    #b1: Lấy id
    $sanpham_id = $_GET['sanpham_id'];
    #b2: Xóa + Về trang index thông báo
    $query = "DELETE FROM tbl_sanpham WHERE sanpham_id = {$sanpham_id}";
    if($mysqli->query($query)){
        HEADER ("LOCATION: index.php?msg=Xóa danh mục thành công");
    }else{
        HEADER ("LOCATION: index.php?msg=Xóa danh mục không thành công");
    }
