<?php
session_start();
require_once 'util/DBConnectionUtil.php';

switch ($_GET['action']) {
    case "add":
        $result = updateCart(true);
        echo json_encode(array(
            'status' => $result,
            'message' => 'Thêm sản phẩm thành công !'
        ));
        break;

    case "delete":
        if (isset($_POST['id'])) {
            unset($_SESSION['cart'][$_POST['id']]);
        }
        echo json_encode(array(
            'status' => 1,
            'message' => 'Xóa sản phẩm thành công!'
        ));
        break;
    default:
        break;
}
function updateCart($add = false)
{
    foreach ($_POST['quantity'] as $id => $quantity) {
        if ($quantity == 0) {
            unset($_SESSION['cart']['$id']);
        } else {
            if (!isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] = 0;
            }
            if ($add) {
                $_SESSION['cart'][$id] += $quantity;
            } else {
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
}
return true;
