<?php
include '../config.php';

$search_term = "";

if (isset($_POST['search_btn'])) {
	$search_term = $_POST['search_term'];
}

?>
<!DOCTYPE html>
<html lang="nl">

<head>
	<title>Alle Winkels</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../img/logo.png" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/elegant-font/html-css/style.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="../vendor/lightbox2/css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/storeMain.css">
    <link rel="stylesheet" type="text/css" href="../css/my-css.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style>
	.search{
		margin-left: 180px;
	}


	.btn-fix {
    height: 30px;
    position: absolute;
    right: 0;
    top: 0px;
    border-radius: 1px;
}
</style>
<body class="animsition">

	<header class="header1">
		<div class="container-menu-header">


			<div class="wrap_header">
				<a href="index.php" class="logo">
					<img src="../img/sparta.png" alt="IMG-LOGO">
				</a>

				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li >
								<a href="index.php">Home</a>
							</li>

							<li class="active">
								<a href="winkels.php">Alle Winkels</a>
							</li>

							<li>
								<a href="contact.php">Over ons</a>
							</li>

								<span class="search">
								<form class="navbar-form" action="<?php echo $_SERVER['PHP_SELF']; ?>"  role="search" method="POST">
						        <div class="input-group">
						            <input type="text" class="form-control" placeholder="Search" name="search_term">
						            <div class="input-group-btn">
						            <button class="btn btn-default btn-fix" type="submit" name="search_btn"><i class="glyphicon glyphicon-search"></i></button>
						            </div>
						        </div>
						        </form>
								</span>
						</ul>
					</nav>
				</div>

				<div class="header-icons">
					<a href="" class="header-wrapicon1 dis-block">
						<span> <a href="login.php" class="fa fa-sign-in"></a> </span>
					</a>
				</div>
			</div>
		</div>

	</header>
	</section>
	<div class="container">
		<section class="blog bgwhite p-t-94 populair_winkel">
            <div class="container">
                <div class="row ">
					<?php
					$sql_query = "SELECT * FROM stores WHERE store_active='Yes' AND store_name LIKE '%$search_term%' ORDER BY store_name ASC";
					$result = $conn->query($sql_query);

						while ($row = mysqli_fetch_assoc($result)) {
							$store_id = $row['store_id'];
							$store_name =$row['store_name'];
							$img_path=$row['store_img_path'];
					?>
					<div id="<?php echo $store_id; ?>" class="col-sm-10 col-md-3 p-b-30 m-l-r-auto ">
						<h3 class="webstore_header"><?php echo $store_name; ?></h3>
						<!-- Block3 -->
						<div class="block3 ">
							<a class="block3-img p-t-10 p-b-10 dis-block hov-img-zoom">
								<img src="<?php echo $img_path; ?>">
							</a>

							<div class="block3-txt p-t-14 ">
								<p class="s-text8 p-t-16 ">
									Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
								</p>
							</div>
						</div>
					</div>
						<?php } ?>
				</div>
            </div>
        </section>
	</div>

		<div class="t-center p-l-15 p-r-15">
			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved.</a>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../vendor/animsition/js/animsition.min.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../vendor/select2/select2.min.js"></script>

	<script type="text/javascript" src="../vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="../js/slick-custom.js"></script>
	<script type="text/javascript" src="../vendor/countdowntime/countdowntime.js"></script>
	<script type="text/javascript" src="../vendor/lightbox2/js/lightbox.min.js"></script>
	<script type="text/javascript" src="../vendor/sweetalert/sweetalert.min.js"></script>
	<script src="../js/storeMain.js"></script>

</body>

</html>
