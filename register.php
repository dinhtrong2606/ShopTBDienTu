<?php
require_once "util/DBConnectionUtil.php"; ?>
<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="templates/mello/css/register.css" rel="stylesheet" type="text/css" media="all" />



<script defer src="templates/mello/js/validate-register.js"></script>
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Đăng kí tài khoản</h1>
		<?php
			if(isset($_POST['submit'])){
					$fullname = $_POST['fullname'];
					$username = $_POST['username'];
					$email = $_POST['email'];
					$password = md5($_POST['password']);
					$rePassword = md5($_POST['repassword']);
				
					if($username != "" && $email != "" && $password != "" && $rePassword != ""){
						$sql = "INSERT INTO `users` (`user_id`,`fullname` , `username`, `email`, `password`, `rePassword`, `status`, `created_time`) VALUES (NULL, '".$fullname."' ,'".$username."', '".$email."', '".$password."', '".$rePassword."', '1', current_timestamp())";
						$result = $mysqli->query($sql);
						?>
						<script>alert('Bạn đã đăng kí thành công')</script>
						<?php
					}
			}
		?>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form id="form"  method="POST">
					<input type="text" class="text" name="fullname" placeholder="Fullname" required="">
					<br />
					<input class="text" type="text" name="username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="repassword" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input name="submit" type="submit" value="SIGNUP">
				</form>
				<p>Don't have an Account? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		
	</div>
	<!-- //main -->
</body>
</html>