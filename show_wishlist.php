<?php require_once 'templates/mello/inc/header.php'; ?>
<?php require_once 'util/function.php'; ?>
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="text-align: center;font-size: 30px;margin-bottom: 20px"><b>My Wishlist</b></h2>
                <!-- Shopping Summery -->
                <table style="width: 800px;margin-left: 15%" class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>HÌNH ẢNH</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th class="text-center">PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center"><i class="fas fa-trash-alt"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = mysqli_query($mysqli, "SELECT * FROM wishlist ORDER BY id DESC");
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <tr id="<?php echo $row['id']; ?>">
                                    <td><img src="files/uploads/<?php echo $row['image']; ?>" alt=""></td>
                                    <td><?php echo $row['product']; ?></td>
                                    <td><?php echo number_format($row['price']); ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><button id="<?php echo $row['id']; ?>" class="delete"><i class="fas fa-trash-alt"></i></button></td>
                                </tr>
                        <?php
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
<script>
 $(document).ready(function() {
    $(".delete").click(function() {

        var del = $(this).attr("id");

        $.ajax({
            url: 'del_wishlist.php',
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