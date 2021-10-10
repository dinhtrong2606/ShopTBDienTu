<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <?php
        $row_count = 4;
        $query1 = mysqli_query($mysqli, "SELECT * FROM admin");
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
                <h2>Quản lý bình luận</h2>
                <?php
                if (isset($_GET['action']) && $_GET['action']) {
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
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">ID</th>
                                        <th style="width: 70px">Name</th>
                                        <th style="width: 140px">Content</th>
                                        <th width="60px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM comment ORDER BY id_comment ASC";
                                    $result = $mysqli->query($query);
                                    while ($arUser = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="<?php echo $cl ?> gradeX">
                                            <td><?php echo $arUser['id_comment'] ?></td>
                                            <td><?php echo $arUser['name'] ?></td>
                                            <td><?php echo $arUser['content'] ?></td>
                                            <td class="center">
                                            <?php if(checkPrivilege('comment_del.php?id=0')) { ?>
                                                <a href="admin/binhluan/del.php?id=<?php echo $arUser['id_comment'] ?>" onclick="return confirm ('Ban co that muon xoa binh luan nay khong ?')" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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