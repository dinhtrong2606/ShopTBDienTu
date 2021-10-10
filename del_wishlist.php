<?php 
require_once "util/DBConnectionUtil.php";
?>
<?php 
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        #b2: Xóa + Về trang index thông báo
        $query = "DELETE FROM wishlist WHERE id = '{$id}'";
        $result = $mysqli->query($query);
    }
?>