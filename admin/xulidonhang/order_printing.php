<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                    <?php 
                    $order = mysqli_query($mysqli, "SELECT orders.name, orders.address, orders.phone, orders.note, order_detail.*, tbl_sanpham.sanpham_name as sanpham_name 
                    FROM orders 
                    INNER JOIN order_detail ON orders.id = order_detail.order_id 
                    INNER JOIN tbl_sanpham ON tbl_sanpham.sanpham_id = order_detail.sanpham_id
                    WHERE orders.id =  {$_GET['id']}");
                    
                    $orders = mysqli_fetch_all($order, MYSQLI_ASSOC);
                    ?>
                    <div class="order-detail-wrapper">
                        <div class="order-detail">
                            <h3>Chi tiết đơn hàng</h3>
                            <label>Người nhận:</label><span>  <?php echo $orders[0]['name'] ?></span><br />
                            <label>Điện thoại:</label><span>  <?php echo $orders[0]['phone'] ?></span><br />
                            <label>Địa chỉ:</label><span>  <?php echo $orders[0]['address'] ?></span><br />
                            <hr>
                            <h4>Danh sách sản phẩm</h4>
                            <ul>
                                <?php 
                                $totalQuantity = 0;
                                $totalMoney = 0;
                                foreach($orders as $row){
                                    ?>
                                    <li>
                                        <span class="item-name"><?php echo $row['sanpham_name'] ?></span>
                                        <span class="item-quantity"> - SL: <?php echo $row['quantity'] ?></span>
                                    </li>
                                    <?php 
                                    $totalMoney += ($row['price'] * $row['quantity']);
                                    $totalQuantity += $row['quantity']; 
                                    ?>
                                    <?php
                                }
                                ?>
                            </ul>
                            <hr>
                            <label>Tổng SL: </label><?php echo $totalQuantity; ?> - <label>Tổng tiền</label> <?php echo number_format($totalMoney); ?><br>
                            <label>Ghi chú:</label><span> <?php echo $orders[0]['note']; ?></span>
                        </div>
                    </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<?php require_once '../../templates/admin/inc/footer.php'; ?>