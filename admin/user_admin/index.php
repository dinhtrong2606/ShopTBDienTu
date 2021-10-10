<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
    <?php 
    $row_count = 4;
    $query1 = mysqli_query($mysqli, "SELECT * FROM admin");
    $tongsodong = mysqli_num_rows($query1);
    $sotrang = ceil($tongsodong / $row_count);
    if(isset($_GET['page'])){
        $curent_page = $_GET['page'];
    }else{
        $curent_page = 1;
    }
    $offset = ($curent_page -1 ) * $row_count;
    ?>
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý người dùng</h2>
                <?php 
                if(isset($_GET['action']) && $_GET['action']){
                    echo 'Đã cập nhật người dùng thành công';
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
                                    <?php if(checkPrivilege('user_add.php')) { ?>
                                    <a href="admin/user_admin/add.php" class="btn btn-success btn-md">Thêm</a>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" name="timkiem" class="form-control input-sm" placeholder="Nhập tên thành viên" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Ngày cập nhật</th>
                                        <th>FullName</th>
                                        <th>Phân quyền</th>
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
                                    
                                    $where = "id != " . $_SESSION['admin']['id'];

                                    $query = "SELECT * FROM admin WHERE fullname LIKE '%$search%' AND (".$where.") ORDER BY id DESC LIMIT $offset, $row_count";
                                    $result = $mysqli->query($query);
                                    while($arUser = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                        <tr class="<?php echo $cl ?> gradeX">
                                            <td><?php echo $arUser['id'] ?></td>
                                            <td><?php echo $arUser['username'] ?></td>
                                            <td><?php echo $arUser['created_time'] ?></td>
                                            <td><?php echo $arUser['fullname'] ?></td>
                                            <?php if(checkPrivilege('quyentv.php?id=0')) {  ?>
                                            <td><a style="font-size: 13px;text-decoration:none" href="admin/user_admin/user_privilege.php?id=<?php echo $arUser['id']; ?>">Phân quyền</a></td>
                                           <?php } ?>
                                            <td class="center">

                                                <?php if(checkPrivilege('user_edit.php?id=0')) { ?>
                                                <a href="admin/user_admin/edit.php?id=<?php echo $arUser['id']; ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <?php } ?>
                                                
                                                <?php if(checkPrivilege('user_del.php?id=0')) { ?>
                                                <a href="admin/user_admin/del.php?id=<?php echo $arUser['id'] ?>" onclick="return confirm ('Ban co that muon xoa nguoi dung nay khong ?')" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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
                                            for($i = 1; $i <= $sotrang; $i++){
                                                $active = '';
                                                if($i == $curent_page ){
                                                    $active = 'active';
                                                }
                                            ?>
                                            <li class="paginate_button <?php echo $active; ?>" aria-controls="dataTables-example" tabindex="0"><a href="admin/user_admin/index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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