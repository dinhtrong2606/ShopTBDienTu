<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa Sản Phẩm</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['sanpham_id'])) {
                    $sanpham_id = $_GET['sanpham_id'];
                }
                ?>
                <?php
                #SELECT
                $sql = "SELECT * FROM tbl_sanpham WHERE sanpham_id = $sanpham_id";
                $result  = $mysqli->query($sql);
                $row_edit = mysqli_fetch_array($result);

                #UPDATE
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $danhmucsp = $_POST['menu'];
                    $sanpham_gia = $_POST['gia'];
                    $sanpham_km = $_POST['sanpham_km'];
                    $sanpham_sl = $_POST['sanpham_sl'];
                    $sold_num = $_POST['sold_num'];
                    if ($_FILES['picture']['name']) {
                        #Xu ly upload anh
                        $filename = $_FILES['picture']['name'];
                        $arFile = explode('.', $filename);
                        $typeFile = end($arFile);
                        $nameFile = $arFile['0'];
                        $newFilename = $nameFile. '.' . $typeFile;
                        $tmpName = $_FILES['picture']['tmp_name'];
                        $resultUpload = move_uploaded_file($tmpName, '../../files/uploads/' . $newFilename);
                    }


                    if ($name != "" && $danhmucsp != "") {
                        $sql = "UPDATE tbl_sanpham SET sanpham_name = '$name' , id_menu = '$danhmucsp', sanpham_gia = '$sanpham_gia', sanpham_giakhuyenmai = '$sanpham_km', sanpham_soluong = '$sanpham_sl', sold_number = '$sold_num', sanpham_image = '$newFilename'  WHERE sanpham_id = $sanpham_id";
                        $row_sql = $mysqli->query($sql);
                ?>
                        <script>
                            window.location.href = 'admin/product/index.php'
                        </script>
                <?php
                    }
                }
                ?>
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên Sản Phẩm</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $row_edit['sanpham_name'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Danh mục Sản phẩm</label>
                                        <select class="form-control" name="menu">
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
                                        <input type="text" name="gia" class="form-control" value="<?php echo $row_edit['sanpham_gia'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Giá KM</label>
                                        <input type="text" name="sanpham_km" class="form-control" value="<?php echo $row_edit['sanpham_giakhuyenmai'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="text" name="sanpham_sl" class="form-control" value="<?php echo $row_edit['sanpham_soluong'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>SL sold</label>
                                        <input type="text" name="sold_num" class="form-control" value="<?php echo $row_edit['sold_number'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="picture" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
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