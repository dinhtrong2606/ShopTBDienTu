<?php
session_start();
require_once "util/DBConnectionUtil.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Đăng nhập</title>
  </head>

<body>
  <?php
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    #Kiem tra tai khoan
    $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
    $result = $mysqli->query($query);
    $infoUser = mysqli_fetch_assoc($result);

    if (!empty($infoUser)) {
      #Luu session
      $_SESSION['user'] = $infoUser;
      header('Location: index.php');
    } else {
      echo "Khong co du lieu";
    }
  }

  ?>
  
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Đăng nhập</h5>
            <br>
            <form class="form-signin" method="POST" >
              <div class="form-label-group">
                <input type="text" class="form-control" placeholder="Username" name="username" required=""  >
                
              </div>
              <br>
              <div class="form-label-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="" >
                
              </div>
              <br />
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">LOG IN</button>
              <hr class="my-4">
              
            </form>
            <p style="display: inline-block;margin-right:10px">Don't have an account?</p><a style="text-decoration: none;" href="register.php">Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>