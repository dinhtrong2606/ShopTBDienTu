<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>



<div id="page-wrapper">
    <div id="page-inner">
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
                                    <?php
                                    if (!empty($_GET['action']) && $_GET['action'] == 'save') {
                                        $data = $_POST;
                                        $insertString = "";
                                        $deleteOldPrivileges = mysqli_query($mysqli, "DELETE FROM `user_privilege` WHERE `user_id` = ".$data['user_id']);
                                        foreach ($data['privileges'] as $insertPrivilege) {
                                            $insertString .= !empty($insertString) ? "," : "";
                                            $insertString .= "(NULL, " . $data['user_id'] . ", " . $insertPrivilege . ", '1595430953')";
                                        }
                                        $insertPrivilege = mysqli_query($mysqli, "INSERT INTO `user_privilege` (`id`, `user_id`, `privilege_id`, `created_time`) VALUES " . $insertString);
                                        if (!$insertPrivilege) {
                                            $error = "Phân quyền không thành công. Xin thử lại";
                                        }
                                    ?>
                                        <?php if (!empty($error)) { ?>
                                            echo $error;
                                        <?php } else { ?>
                                            Phân quyền thành công. <a href="index.php">Quay lại danh sách thành viên</a>
                                        <?php } ?>
                                    <?php } else { ?>
                                    <?php
                                        $privileges = mysqli_query($mysqli, "SELECT * FROM `privilege`");
                                        $privileges = mysqli_fetch_all($privileges, MYSQLI_ASSOC);

                                        $privilegeGroup = mysqli_query($mysqli, "SELECT * FROM `privilege_group` ORDER BY `privilege_group`.`position` ASC");
                                        $privilegeGroup = mysqli_fetch_all($privilegeGroup, MYSQLI_ASSOC);

                                        $currentPrivileges = mysqli_query($mysqli, "SELECT * FROM `user_privilege` WHERE `user_id` = " . $_GET['id']);
                                        $currentPrivileges = mysqli_fetch_all($currentPrivileges, MYSQLI_ASSOC);
                                        $currentPrivilegeList = array();
                                        if (!empty($currentPrivileges)) {
                                            foreach ($currentPrivileges as $currentPrivilege) {
                                                $currentPrivilegeList[] = $currentPrivilege['privilege_id'];
                                            }
                                        }
                                    }
                                    ?>


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