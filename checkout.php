<?php require_once 'templates/mello/inc/header.php'; ?>
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>NAME</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th class="text-center">PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">THỜI GIAN ĐẶT</th>
                            <th class="text-center">TÌNH TRẠNG</th>
                            <th class="text-center"><i class="fas fa-trash-alt"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $id = $_SESSION['user']['user_id'];
                            $order = mysqli_query($mysqli, "SELECT orders.name, orders.address, orders.phone, orders.note, order_detail.*, tbl_sanpham.sanpham_name as sanpham_name 
                            FROM orders 
                            INNER JOIN order_detail ON orders.id = order_detail.order_id 
                            INNER JOIN tbl_sanpham ON tbl_sanpham.sanpham_id = order_detail.sanpham_id
                            WHERE orders.user_id =  {$id}");
                            while ($row = mysqli_fetch_array($order)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['sanpham_name']; ?></td>
                                    <td><?php echo number_format($row['price']); ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['created_time']; ?></td>
                                    <td>Wait for ...</td>
                                    <td class="action" data-title="Remove"><a href="delCheckout.php?id=<?php echo $row['id']; ?>" onclick="return confirm ('Bạn có thật sự muốn xóa sản phẩm này không?')"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo 'Giỏ hàng rỗng!';
                        }
                        ?>


                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>

    </div>
</div>
</section>
<?php require_once 'templates/mello/inc/footer.php'; ?>