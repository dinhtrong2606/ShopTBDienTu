<?php require_once 'templates/mello/inc/header.php'; ?>
<?php require_once "util/CheckLoadCart.php" ?>

<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <?php
                ob_start();
                $error = false;
                $success = false;
                if (isset($_GET['action'])) {
                    function updateCart($add = false)
                    {
                        foreach ($_POST['quantity'] as $id => $quantity) {
                            if ($quantity == 0) {
                                unset($_SESSION['cart']['$id']);
                            } else {
                                if ($add) {
                                    $_SESSION['cart'][$id] += $quantity;
                                } else {
                                    $_SESSION['cart'][$id] = $quantity;
                                }
                            }
                        }
                    }


                    switch ($_GET['action']) {
                        case "add":
                            updateCart(true);
                ?>
                            <script>
                                window.location.href = 'cart.php';
                            </script>
                        <?php
                            break;
                        case "delete":
                            if (isset($_GET['id'])) {
                                unset($_SESSION['cart'][$_GET['id']]);
                            }
                        ?>
                            <script>
                                window.location.href = 'cart.php';
                            </script>
                <?php
                            break;
                        case "submit":
                            if (isset($_POST['update-click'])) {
                                updateCart();
                            } elseif (isset($_POST['order-click'])) {
                                if (empty($_POST['nguoinhan'])) {
                                    $error = 'Bạn chưa nhập tên của người nhận';
                                } elseif (empty($_POST['dienthoai'])) {
                                    $error = 'Bạn chưa nhập số điện thoại';
                                } elseif (empty($_POST['diachi'])) {
                                    $error = 'Bạn chưa nhập địa chỉ';
                                } elseif (empty($_POST['quantity'])) {
                                    $error = 'Giỏ hàng rỗng';
                                }
                                if (isset($_SESSION['user'])) {
                                    $id_user = $_SESSION['user']['user_id'];
                                }
                                if ($error == false && !empty($_POST['quantity'])) {
                                    $result = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE sanpham_id IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                                    $subtotal = 0;
                                    $orderSanpham = array();
                                    while ($row = mysqli_fetch_array($result)) {
                                        $orderSanpham[] = $row;
                                        $subtotal += $row['sanpham_giakhuyenmai'] * $_POST['quantity'][$row['sanpham_id']];
                                    }
                                    $insertOrder = mysqli_query($mysqli, "INSERT INTO `orders` (`id`, `user_id` ,`name`, `phone`, `address`, `note`, `total`, `created_time`) VALUES (NULL, '" . $id_user . "' , '" . $_POST['nguoinhan'] . "', '" . $_POST['dienthoai'] . "', '" . $_POST['diachi'] . "', '" . $_POST['ghichu'] . "', '" . $subtotal . "', current_timestamp())");
                                    $orderID = $mysqli->insert_id;
                                    $insertString = "";
                                    foreach ($orderSanpham as $key => $result) {
                                        $insertString .= "(NULL, '" . $orderID . "', '" . $result['sanpham_id'] . "', '" . $id_user . "' ,'" . $_POST['quantity'][$result['sanpham_id']] . "', '" . $result['sanpham_giakhuyenmai'] . "', current_timestamp())";
                                        if ($key !=  count($orderSanpham) - 1) {
                                            $insertString .= ",";
                                        }
                                    }
                                    $insertOrder = mysqli_query($mysqli, "INSERT INTO `order_detail` (`id`, `order_id`, `sanpham_id`, `user_id` ,`quantity`, `price`, `created_time`) VALUES " . $insertString . ";");
                                    $soluong = $result['sanpham_soluong'] - $_POST['quantity'][$result['sanpham_id']];
                                    $sold_number = $_POST['quantity'][$result['sanpham_id']];
                                    $query5 = "UPDATE tbl_sanpham SET sanpham_soluong = '{$soluong}' , sold_number = '$sold_number' WHERE sanpham_id = {$result['sanpham_id']}";
                                    $result5 = $mysqli->query($query5);
                                    $success = 'Bạn đã đặt hàng thành công';
                                }
                            }
                            break;
                    }
                }
                if (!empty($_SESSION['cart'])) {
                    $result = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE sanpham_id IN (" . implode(",", array_keys($_SESSION['cart'])) . ")");
                }
                ob_end_flush();
                ?>
                <?php if (!empty($error)) { ?>
                    <div style="color:red" id="notify-msg">
                        <?php echo $error; ?>. <a style="color: blue;" href="javascript:history.back()">QUAY LẠI</a>
                    </div>
                <?php } elseif (!empty($success)) { ?>
                    <div style="color:red" id="notify-msg">
                        <?php echo $success; ?>. <a style="color: blue;" href="index.php">TIẾP TỤC MUA HÀNG</a>
                    </div>
                <?php } ?>
                <form id="cart-form" action="cart.php?action=submit" method="POST">
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="fas fa-trash-alt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $subtotal = 0;
                            if (!empty($result)) {
                                while ($row = mysqli_fetch_array($result)) {
                            ?>

                                    <tr id="<?php echo $row['sanpham_id']; ?>">
                                        <td class="image" data-title="No"><img style="width: 300px;height:100px" src="files/uploads/<?php echo $row['sanpham_image']; ?>" alt="#"></td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name"><a href="#"><?php echo $row['sanpham_name']; ?></a></p>
                                            <p class="product-des"><?php echo $row['preview_text']; ?></p>
                                        </td>
                                        <td class="price" data-title="Price"><span><?php echo number_format($row['sanpham_giakhuyenmai']); ?></span></td>
                                        <td class="qty" data-title="Qty">
                                            <!-- Input Order -->
                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="number" name="quantity[<?php echo $row['sanpham_id']; ?>]" class="input-number" data-min="1" data-max="100" value="<?php echo $_SESSION['cart'][$row['sanpham_id']]; ?>">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--/ End Input Order -->
                                        </td>
                                        <td class="total-amount" data-title="Total"><span><?php echo number_format($row['sanpham_giakhuyenmai'] * $_SESSION['cart'][$row['sanpham_id']]); ?></span></td>
                                        <td class="action" data-title="Remove"><button id="<?php echo $row['sanpham_id']; ?>" class="btn-cart"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php
                                    $subtotal += ($row['sanpham_giakhuyenmai'] * $_SESSION['cart'][$row['sanpham_id']]);
                                    $free_shipping = 20000;
                                    $total_pay = $subtotal - $free_shipping;
                                }
                                if (empty($_SESSION['cart'])) {
                                    $subtotal = 0;
                                    $total_pay = 0;
                                    $free_shipping = 0;
                                }
                                ?>
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <hr>
                            <div class="left">
                                <label for="">Người nhận: </label>
                                <input type="text" class="form-control" name="nguoinhan">
                                <label for="">Điện thoại: </label>
                                <input type="text" class="form-control" name="dienthoai">
                                <label for="">Địa chỉ: </label>
                                <input type="text" class="form-control" name="diachi">
                                <label for="">Ghi chú: </label>
                                <textarea name="ghichu" id="" cols="30" rows="10"></textarea>
                                <button class="btn btn-success btn-md" type="submit" name="order-click">Đặt hàng</button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <button style="margin-bottom: 100px;margin-left: 55px" class="btn btn-success btn-md" name="update-click">Cập nhật giỏ hàng</button>
                                <ul>
                                    <li>Cart Subtotal<span><?php echo number_format($subtotal); ?></span></li>
                                    <li>Shipping<span>Free</span></li>
                                    <li>You Save<span><?php echo number_format($free_shipping); ?></span></li>
                                    <li class="last">You Pay<span><?php echo number_format($total_pay); ?></span></li>
                                    <div class="payment-cart">
                                        <div>
                                            <input type="checkbox">
                                            <label for="">Thanh toán khi nhận hàng</label>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <label for="">Thanh toán bằng:</label>
                                            <div id="paypal-payment-button">

                                            </div>
                                        </div>
                                    </div>
                                </ul>
                                <div class="button5">
                                    <a href="#" class="btn">Checkout</a>
                                    <a href="index.php" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
        </form>

    <?php } ?>

    </div>
</div>
<!--/ End Shopping Cart -->

<!-- Start Shop Services Area  -->
<section class="shop-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="fas fa-shipping-fast"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="fas fa-undo"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="fas fa-money-check-alt"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="fas fa-hand-peace"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<?php require_once 'templates/mello/inc/footer.php'; ?>
<script>
    $(document).ready(function() {
        $(".btn-cart").click(function() {

            var del = $(this).attr("id");

            $.ajax({
                url: 'process-cart.php?action=delete',
                type: 'POST',
                data: {
                    id: del
                },
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 0) { //co loi
                        alert(response.message);
                    } else {
                        if (confirm('Bạn muốn xóa sản phẩm này !')) {
                            $('#' + del).remove();
                        }
                    }
                }
            });

        });
    });
</script>