<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper" >
    <div id="page-inner">
        <?php
        $row_count = 4;
        $query1 = mysqli_query($mysqli, "SELECT * FROM menu");
        $tongsodong = mysqli_num_rows($query1);
        $sotrang = ceil($tongsodong / $row_count);

        if (isset($_GET['page'])) {
            $curent_page = $_GET['page'];
        } else {
            $curent_page = 1;
        }
        $offset = ($curent_page - 1) * $row_count;
        ?>
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý danh mục</h2>
                <?php
                if (isset($_GET['msg']) && $_GET['msg']) {
                    echo $_GET['msg'];
                }
                ?>
            </div>
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
                                    <?php if(checkPrivilege('cat_add.php')){ ?>
                                    <a href="admin/cat/add.php" class="btn btn-success btn-md">Thêm</a>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" name="timkiem" class="form-control input-sm" placeholder="Nhập tên danh mục" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">ID</th>
                                        <th style="text-align:center">Tên danh mục</th>

                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if(isset($_POST['search'])){
                                    $search = $_POST['timkiem'];
                                }else{
                                    $search = '';
                                }

                                //b1 viet cau lenh query danh sach danh muc
                                $query = "SELECT * FROM menu WHERE name_menu LIKE '%$search%' ORDER BY id_menu ASC LIMIT $offset, $row_count";
                                $result = $mysqli->query($query);
                                while($arCat = mysqli_fetch_assoc($result)){
                                ?>

                                    
                                        <tr class="<?php echo $cl ?> gradeX">
                                            <td style="text-align:center" ><?php echo $arCat['id_menu'] ?></td>
                                            <td style="text-align:center"><?php echo $arCat['name_menu'] ?></td>
                                            <td class="center">
                                                <?php if(checkPrivilege('cat_edit.php?cat_id=0')){ ?>
                                                <a  href="admin/cat/edit.php?cat_id=<?php echo $arCat['id_menu'] ?>" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <?php } ?>

                                                <?php if(checkPrivilege('cat_del.php?cat_id=0')){ ?>
                                                <a href="admin/cat/del.php?cat_id=<?php echo $arCat['id_menu'] ?>" onclick="return confirm ('Bạn có thật sự muốn xóa danh mục này không?')" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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
                                                if($i  == $curent_page){
                                                    $active = 'active';
                                                }
                                            ?>
                                                <li class="paginate_button <?php echo $active; ?>" aria-controls="dataTables-example" tabindex="0"><a href="admin/cat/index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
