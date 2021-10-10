<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm Danh Mục</h2>
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
                                    $error = array();
                                    if ($_POST['name']) {
                                        $name = $_POST['name'];
                                    } else {
                                        $error['name'] = 'Chưa nhập tên danh mục';
                                    }

                                    if (empty($error)) {
                                        $query = "INSERT INTO menu (name_menu) VALUE ('{$name}')";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            ?>
                                                <script>
                                                    window.location.href = 'admin/cat/index.php'
                                                </script>
                                            <?php
                                        } else {
                                            echo "Lỗi! Không thể thêm danh mục";
                                        }
                                    }
                                }
                                ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Tên Danh mục</label>
                                        <input type="text" name="name" class="form-control" />
                                        <?php echo isset($error['name']) ? $error['name'] : '' ?>
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
