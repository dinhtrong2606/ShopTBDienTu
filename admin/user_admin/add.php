<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm thành viên</h2>
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
                                    $username = $_POST['username'];
                                    $password = md5($_POST['password']);
                                    $fullname = $_POST['fullname'];

                                    if ($username == "") {
                                        echo 'Vui long nhap ten nguoi dung . <br />';
                                    }
                                    if ($password == "") {
                                        echo 'Vui long nhap mat khau nguoi dung<br />';
                                    }
                                    if ($fullname == "") {
                                        echo 'Vui long nhap day du ten nguoi dung';
                                    }
                                    if ($username != "" && $fullname != "") {
                                        $sql = "INSERT INTO admin(username, password, fullname) VALUES ('$username', '$password','$fullname')";
                                        $sql = $mysqli->query($sql);
                                ?>
                                        <script>
                                            
                                            window.location.href = 'admin/user_admin/index.php';
                                        </script>
                                <?php
                                    }
                                }

                                ?>
                                <form method="POST">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" name="fullname">
                                    <br />
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