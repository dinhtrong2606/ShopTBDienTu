<?php require_once '../../templates/admin/inc/header.php'; ?>
<?php require_once '../../templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa danh mục</h2>
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
                                #SELECT
                                $cat_id = $_GET['cat_id'];
                                $select = "SELECT * FROM menu WHERE id_menu = {$cat_id}";
                                if ($mysqli->query($select)) {
                                    $infoCat = mysqli_fetch_assoc($mysqli->query($select));
                                }
                                #UPDATE
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['name']) {
                                        $name = $_POST['name'];
                                    } else {
                                        $error['name'] = 'Chưa nhập tên danh mục';
                                    }

                                    if (empty($error)) {
                                        $query = "UPDATE menu SET name_menu = '{$name}' WHERE id_menu = {$cat_id}";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                           ?>
                                            <script>
                                                window.location.href = 'admin/cat/index.php'
                                            </script>
                                           <?php
                                        } else {
                                            echo "Lỗi! Không thể cập nhật danh mục";
                                        }
                                    }
                                }
                                ?>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Tên Thể Loại</label>
                                        <input type="text" value="<?php echo $infoCat['name_menu'] ?>" name="name" class="form-control" />
                                        <?php echo isset($error['name_menu']) ? $error['name_menu'] : '' ?>
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
<?php require_once '../../templates/admin/inc/footer.php'; ?>