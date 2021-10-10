<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa người dùng</h2>
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
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                }
                                ?>
                                <?php
                                #SELECT
                                $sql = "SELECT * FROM admin WHERE id = $id";
                                $result  = $mysqli->query($sql);
                                $row_edit = mysqli_fetch_array($result);
                                ?>
                                <?php
                                if (isset($_POST['submit'])) {
                                    $username = $_POST['username'];
                                    $fullname = $_POST['fullname'];

                                    if ($username == "") {
                                        echo "Vui long nhap tai khoan nguoi dung <br />";
                                    }
                                    if ($fullname == "") {
                                        echo "Vui long nhap day du ten nguoi dung";
                                    }

                                    if ($username != "" && $fullname != "") {
                                        $sql = "UPDATE admin SET username = '$username' , fullname = '$fullname' WHERE id = $id";
                                        $row_sql = $mysqli->query($sql);
                                ?>
                                        <script>
                                            window.location.href = 'admin/user_admin/index.php';
                                        </script>
                                <?php
                                    }
                                }

                                ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $row_edit['username']; ?>" />
                                        <label>Fullname</label>
                                        <input type="text" value="<?php echo $row_edit['fullname']; ?>" name="fullname" class="form-control" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Cập nhật</button>
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
<?php require_once '../../templates/admin/inc/footer.php';  ?>