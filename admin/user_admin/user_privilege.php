<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Phân quyền thành viên</h2>
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
                                    <?php if (!empty($_GET['action']) && $_GET['action'] == "save") {
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
                                            Phân quyền thành công. <a href="admin/user_admin/user_privilege.php">Quay lại danh sách thành viên</a>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php
                                        $privileges = mysqli_query($mysqli, "SELECT * FROM privilege");
                                        $privileges = mysqli_fetch_all($privileges, MYSQLI_ASSOC);
                                        $privilegesGroup = mysqli_query($mysqli, "SELECT * FROM privilege_group");
                                        $privilegesGroup = mysqli_fetch_all($privilegesGroup, MYSQLI_ASSOC);

                                        $currentPrivileges = mysqli_query($mysqli, "SELECT * FROM `user_privilege` WHERE `user_id` = " . $_GET['id']);
                                        $currentPrivileges = mysqli_fetch_all($currentPrivileges, MYSQLI_ASSOC);
                                        $currentPrivilegeList = array();
                                        if (!empty($currentPrivileges)) {
                                            foreach ($currentPrivileges as $currentPrivilege) {
                                                $currentPrivilegeList[] = $currentPrivilege['privilege_id'];
                                            }
                                        }
                                        ?>
                                        <form id="editing-form" method="post" action="admin/user_admin/user_privilege.php?action=save" enctype="multipart/form-data">
                                            <input style="margin-left: 180%;background-color: blue;color:white" type="submit" title="Lưu thành viên" value="SAVE">
                                            <input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">
                                            <div style="clear:both"></div>
                                            <?php foreach ($privilegesGroup as $group) { ?>
                                                <div class="privilege_group">
                                                    <h3 class="group-name"><?php echo $group['name']; ?></h3>
                                                    <?php
                                                    foreach ($privileges as $privilege) {
                                                        if ($privilege['group_id'] == $group['id']) {
                                                    ?>
                                                            <ul>
                                                                <li>
                                                                    <input type="checkbox" <?php if (in_array($privilege['id'], $currentPrivilegeList)) { ?> checked="" <?php } ?> value="<?= $privilege['id'] ?>" id="privilege_<?= $privilege['id'] ?>" name="privileges[]" />
                                                                    <label for="privilege_<?php echo $privilege['id'] ?>"><?php echo $privilege['name'] ?></label>
                                                                </li>
                                                        <?php
                                                        }
                                                    }
                                                        ?>
                                                        <div style="clear:both"></div>
                                                            </ul>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </form><br />
                                    <?php } ?>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">

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