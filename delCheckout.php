<?php
    require_once 'templates/mello/inc/header.php';
    #b1: Lấy id
    $id = $_GET['id'];
    #b2: Xóa + Về trang index thông báo
    $query = "DELETE FROM order_detail WHERE id = {$id}";
    if($mysqli->query($query)){
        ?>
        <script>
            window.location.href = 'checkout.php'
        </script>
        <?php
    }else{
        HEADER ("LOCATION: index.php?msg=Xóa danh mục không thành công");
    }
