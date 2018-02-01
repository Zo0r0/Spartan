<?php
	include '../config.php';
	session_start();

	if(isset($_POST['submit'])){

      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM users WHERE (username = '$username' AND password = '$password' AND user_active = 'Yes')";

      $result = $conn->query($sql);

	  if (!$row = mysqli_fetch_assoc($result)){
		  $username = $_POST['username'];
		  $sql1 = "INSERT INTO logfile(attempt,username,success) VALUES ('login','$username','No')";

		  $result1 = $conn->query($sql1);

		  echo "";

  	} else{
		  if($row['accesslevel'] == "0") {
	 		 $_SESSION['id']= $row['user_id'];
	 		 $_SESSION['user_name']= $row['user_name'];
			 $_SESSION['username']= $row['username'];

			$sql2 = "INSERT INTO logfile(attempt,username,success) VALUES ('login','$username','Yes')";
   		  	$result2 = $conn->query($sql2);

	 			 header('Location:../cms/index1.php');
	 	 }
	 	 else if($row['accesslevel'] == "1"){
			$_SESSION['id']= $row['user_id'];
			$_SESSION['user_name']= $row['user_name'];
			 $_SESSION['username']= $row['username'];

			$sql3 = "INSERT INTO logfile(attempt,username,success) VALUES ('login','$username','Yes')";
   		  	$result3 = $conn->query($sql3);

				header('Location:../cms/index.php');
		}else{
			echo "Iets is niet goed";
		}
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login SpartanMall</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../logo/images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/loginMain.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../img/logo.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid username is required">
						<input class="input100" type="text" id="username" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="submit" class="login100-form-btn" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>




	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/select2/select2.min.js"></script>
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="../js/loginMain.js"></script>

</body>

</html>
