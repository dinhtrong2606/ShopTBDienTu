<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm Sản Phẩm</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if (isset($_POST['submit'])) {
                                    // them thong tin vao db chua can them hinh anh
                                    $sanpham_name = $_POST['sanpham_name'];
                                    $danhmuc = $_POST['name'];
                                    $sanpham_gia = $_POST['sanpham_gia'];
                                    $sanpham_km = $_POST['sanpham_km'];
                                    $sanpham_active = $_POST['sanpham_active'];
                                    $sanpham_hot = $_POST['sanpham_hot'];
                                    $sanpham_sl = $_POST['sanpham_sl'];
                                    $sanpham_preview = $_POST['preview'];
                                    $sold_num = $_POST['sold_num'];
                                    // xu ly upload anh
                                    if ($_FILES['picture']['name']) {
                                        #Xu ly upload anh
                                        $filename = $_FILES['picture']['name'];
                                        $arFile = explode('.', $filename);
                                        $typeFile = end($arFile);
                                        $nameFile = $arFile['0'];
                                        $newFilename = $nameFile . '.' . $typeFile;
                                        $tmpName = $_FILES['picture']['tmp_name'];
                                        $resultUpload = move_uploaded_file($tmpName, '../../files/uploads/' . $newFilename);
                                        if ($resultUpload) {
                                            echo "Thêm thành công";
                                        }
                                    }
                                    $query = "INSERT INTO tbl_sanpham(id_menu,sanpham_name , sanpham_gia, sanpham_giakhuyenmai, sanpham_active, sanpham_hot ,sanpham_soluong, sanpham_image ,preview_text, sold_number) VALUES ('$danhmuc','$sanpham_name','$sanpham_gia', '$sanpham_km', '$sanpham_active', '$sanpham_hot' ,'$sanpham_sl' ,'$newFilename', '$sanpham_preview', '$sold_num')";
                                    $result = $mysqli->query($query);
                                    if ($result) {
                                ?>
                                        <script>
                                            window.location.href = 'admin/product/index.php'
                                        </script>
                                <?php
                                    }
                                    die();
                                    $sql = "INSERT INTO tbl_sanpham(id_menu ,sanpham_name ,sanpham_gia, sanpham_giakhuyenmai, sanpham_active, sanpham_hot ,sanpham_soluong, sanpham_image ,preview_text, sold_number) VALUES ('$danhmuc','$sanpham_name' ,'$sanpham_gia', '$sanpham_km', '$sanpham_active', '$sanpham_hot' ,'$sanpham_sl' ,'$newFilename', '$sanpham_preview', '$sold_num')";
                                    $qr = $mysqli->query($sql);
                                }
                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" name="sanpham_name" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Danh mục sản phẩm</label>
                                        <select class="form-control" name="name">
                                            <?php
                                            $queryCat = "SELECT * FROM menu ORDER BY id_menu ASC";
                                            $result_cat = $mysqli->query($queryCat);
                                            while ($row_cat = mysqli_fetch_assoc($result_cat)) {
                                            ?>
                                                <option value="<?php echo $row_cat['id_menu'] ?>"><?php echo $row_cat['name_menu']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input type="text" name="sanpham_gia" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Giá khuyến mãi</label>
                                        <input type="text" name="sanpham_km" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Sản phẩm Active</label>
                                        <input type="number" name="sanpham_active" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Sản phẩm Hot</label>
                                        <input type="number" name="sanpham_hot" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="text" name="sanpham_sl" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Preview sản phẩm</label>
                                        <textarea class="form-control" rows="3" name="preview"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Số lượng bán</label>
                                        <input type="text" name="sold_num" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="picture" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
                                </form>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once '../../templates/admin/inc/footer.php'; ?>