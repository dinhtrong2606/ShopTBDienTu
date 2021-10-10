<?php session_start();
require_once '../../util/DBConnectionUtil.php'; ?>
<?php require_once '../../util/CheckUser.php'; 
      require_once '../../admin/config/function.php';

      $regexResult = checkPrivilege(); // kiem tra quyen thanh vien
      // if(!$regexResult){
      //   echo 'Bạn không có quyền truy cập chức năng này';
      // }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <base href="http://localhost/ShopTBDienTu/">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Material Dash</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="templates/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="templates/admin/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="templates/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="templates/admin/assets/vendors/jvectormap/jquery-jvectormap.css">
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="templates/admin/assets/css/demo/style.css">

  <link rel="stylesheet" href="templates/admin/assets/css/privilege.css" >
  <!-- End layout styles -->
  <link rel="shortcut icon" href="templates/admin/assets/images/favicon.png" />
  <script src="templates/admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="templates/admin/assets/vendors/chartjs/Chart.min.js"></script>
  <script src="templates/admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="templates/admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="templates/admin/assets/js/material.js"></script>
  <script src="templates/admin/assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="templates/admin/assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <!-- FONTAWESOME STYLES-->
  <link href="templates/admin/assets/css/font-awesome.css" rel="stylesheet" />

  <link href="templates/admin/assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="templates/admin/assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="templates/admin/assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <!--JQUERY SCRIPT  -->
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

  <script src="https://use.fontawesome.com/d0223c40fa.js"></script>

</head>