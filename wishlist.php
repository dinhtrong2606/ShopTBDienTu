<?php 
session_start();
require_once "util/DBConnectionUtil.php"; ?>

<?php 
    if(!isset($_SESSION['user'])){
        header('location: login.php');
    }else{
        $result = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE sanpham_id = '{$_GET['id']}'");
        while($row = mysqli_fetch_array($result)){
            $image = $row['sanpham_image'];
            $product = $row['sanpham_name'];
            $price = $row['sanpham_giakhuyenmai'];
            $quantity = 1;
        }

        $result_wishlist = mysqli_query($mysqli, "INSERT INTO `wishlist` (`id`, `image`, `product`, `price`, `quantity`) VALUES (NULL, '$image', '$product', '$price', '$quantity');");
        if($result_wishlist){
            header('location: show_wishlist.php');
        }
    }
?>
