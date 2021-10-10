<head>
  <base href="http://localhost/ShopTBDienTu/">
</head>
<body>
<script src="templates/admin/assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header">
        <a href="admin/dashboard/index.php" class="brand-logo">
          <img src="templates/admin/assets/images/logo.svg" alt="logo">
        </a>
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name">Nguyễn Đình Trọng</p>
          
        </div>

        <div class="mdc-list-group active">
          <nav class="mdc-list mdc-drawer-menu">
          <?php if(checkPrivilege('index.php')){ ?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="admin/dashboard/index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Dashboard
              </a>
            </div>
            <?php } ?>
            <?php if(checkPrivilege('cat.php')) {?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="admin/cat/index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                Danh mục
              </a>
            </div>
            <?php } ?>
            
            <?php if(checkPrivilege('product.php')) {?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="admin/product/index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">grid_on</i>
                Sản phẩm
              </a>
            </div>
              <?php } ?>

              <?php if(checkPrivilege('trasaction.php')) {?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="admin/xulidonhang/index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">grid_on</i>
                Đơn hàng
              </a>
            </div>
            <?php } ?>

            <?php if(checkPrivilege('user.php')) {?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="admin/user_admin/index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">contacts</i>
                Quản lí thành viên
              </a>
            </div>
            <?php } ?>

            <?php if(checkPrivilege('comment.php')) {?>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="admin/binhluan/index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">contacts</i>
                Quản lí bình luận
              </a>
            </div>
            <?php } ?>
           
           
          </nav>
        </div>
        <div class="profile-actions">
          <a href="admin/auth/logout.php">Đăng xuất</a>
        </div>
       
      </div>
    </aside>
    <!-- partial -->
</body>