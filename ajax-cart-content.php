<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<h1>Giỏ hàng</h1>
    <br>
    <div class="container">
    <?php
    session_start();
    require_once 'util/DBConnectionUtil.php';
    if (!empty($_SESSION['cart'])) {
        $result = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE sanpham_id IN (" . implode(",", array_keys($_SESSION['cart'])) . ")");
    }
    ?>
    <form id="cart-form"  method="POST">
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
                            <td class="image" data-title="No"><img style="width: 160px;height:100px" src="files/uploads/<?php echo $row['sanpham_image']; ?>" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#"><?php echo $row['sanpham_name']; ?></a>
                            </td>
                            <td class="price" data-title="Price"><span><?php echo number_format($row['sanpham_giakhuyenmai']); ?></span></td>
                            <td class="qty" data-title="Qty">
                                <!-- Input Order -->
                                <div class="input-group">
                                    <input type="number" name="quantity[<?php echo $row['sanpham_id']; ?>" min="1" value="<?php echo $_SESSION['cart'][$row['sanpham_id']]; ?>">
                                </div>
                                <!--/ End Input Order -->
                            </td>
                            <td class="total-amount" data-title="Total"><span><?php echo number_format($row['sanpham_giakhuyenmai'] * $_SESSION['cart'][$row['sanpham_id']]); ?></span></td>
                            <td class="action" data-title="Remove"><button class="btn" id="<?php echo $row['sanpham_id']; ?>"><i class="fas fa-trash-alt"></i></button></td>

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

</form>

<?php } ?>
</div>
<script>
 $(document).ready(function() {
    $(".btn").click(function() {

        var del = $(this).attr("id");

        $.ajax({
            url: 'process-cart.php?action=delete',
            type: 'POST',
            data: {
                id: del
            },
            success: function(data) {
                if(confirm('Bạn muốn xóa sản phẩm này !')){
                   $('#' + del).remove();
               }
            }
        });

    });
});
</script>