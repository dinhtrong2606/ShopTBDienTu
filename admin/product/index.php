<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <?php
    $row_count = 8;
    $query1 = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
    $tongsodong = mysqli_num_rows($query1);
    $sotrang = ceil($tongsodong / $row_count);
    if (isset($_GET['page'])) {
        $curent_page = $_GET['page'];
    } else {
        $curent_page = 1;
    }
    $offset = ($curent_page - 1) * $row_count;
    ?>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản Lý Sản Phẩm</h2>
            </div>
            <?php
            if (isset($_GET['msg']) && $_GET['msg']) {
                echo $_GET['msg'];
            }
            ?>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                <?php if(checkPrivilege('sanpham_add.php')) { ?>
                                    <a href="admin/product/add.php" class="btn btn-success btn-md">Thêm</a>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" name="timkiem" class="form-control input-sm" placeholder="Nhập tên sản phẩm" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Giá</th>
                                        <th>Giá KM</th>
                                        <th>SL</th>
                                        <th>Sold number</th>
                                        <th width="150px">Picture</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['search'])) {
                                        $search = $_POST['timkiem'];
                                    } else {
                                        $search = '';
                                    }
                                    //b1 Viet cau lenh query lay danh sach danh muc
                                    //trùng tên trường [story.*, cat.name as cat_name]
                                    $query = "SELECT tbl_sanpham.*, menu.name_menu AS menu_name FROM tbl_sanpham 
                                                INNER JOIN menu
                                                ON tbl_sanpham.id_menu = menu.id_menu
                                                WHERE tbl_sanpham.sanpham_name LIKE '%$search%' 
                                                ORDER BY tbl_sanpham.sanpham_id ASC
                                                LIMIT $offset, $row_count";
                                    //b2 kết nối giữa php và sql để lấy dữ liệu
                                    $result = $mysqli->query($query);
                                    //b3 chuyển đổi dữ liệu để hiển thị
                                    while ($arUser = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="<?php echo $cl ?> gradeX">
                                            <td><?php echo $arUser['sanpham_id'] ?></td>
                                            <td><?php echo $arUser['sanpham_name'] ?></td>
                                            <td><?php echo $arUser['menu_name'] ?></td>
                                            <td><?php echo $arUser['sanpham_gia'] ?></td>
                                            <td><?php echo $arUser['sanpham_giakhuyenmai'] ?></td>
                                            <td><?php echo $arUser['sanpham_soluong'] ?></td>
                                            <td><?php echo $arUser['sold_number'] ?></td>
                                            <td><img width="100px" height="80px" src="files/uploads/<?php echo $arUser['sanpham_image'] ?>" alt=""></td>

                                            <td class="center">
                                            <?php if(checkPrivilege('product_edit.php?sanpham_id=0')) { ?>
                                                <a href="admin/product/edit.php?sanpham_id=<?php echo $arUser['sanpham_id']; ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <?php } ?>
                                                
                                                <?php if(checkPrivilege('product_del.php?sanpham_id=0')) { ?>
                                                <a href="admin/product/del.php?sanpham_id=<?php echo $arUser['sanpham_id']; ?>" onclick="return confirm ('Bạn có thật sự muốn xóa danh mục này không?')" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của <?php echo $result->num_rows; ?> kết quả </div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                            <?php
                                            for ($i = 1; $i <= $sotrang; $i++) {
                                                $active = '';
                                                if ($i == $curent_page) {
                                                    $active = 'active';
                                                }
                                            ?>
                                                <li class="paginate_button <?php echo $active; ?>" aria-controls="dataTables-example" tabindex="0"><a href="admin/product/index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                            <?php
                                            }
                                            ?>


                                        </ul>
                                    </div>
                                </div>
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