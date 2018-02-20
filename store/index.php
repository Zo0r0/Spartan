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
	<title>Home</title>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<style>
	.search{
		margin-left: 180px;
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
							<li class="active">
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="winkels.php">Alle Winkels</a>
							</li>

							<li>
								<a href="contact.php">Over ons</a>
							</li>




								<span class="search">
								<form class="navbar-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="search" method="POST">
						        <div class="input-group">
						            <input type="text" class="form-control" placeholder="Search" name="search_term">
						            <div class="input-group-btn">
						            <button class="btn btn-default" type="submit" name="search_btn"><i class="glyphicon glyphicon-search"></i></button>
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

	<section>
		<div class="container">
			<div class="sec-title p-b-60">
				<br>
				<h3 class="m-text5 t-center">
					Categorieën
				</h3>
			</div>

			<div class="wrap-slick2">
				<div class="slick2">
					<?php
		            $sql_query = "SELECT * FROM category WHERE cat_show='Yes' AND cat_name LIKE '%$search_term%' ORDER BY cat_name ASC";
		            $result = $conn->query($sql_query);

		                while ($row = mysqli_fetch_assoc($result)) {
		                    $cat_id = $row['category_id'];
		                    $cat_name =$row['cat_name'];
							$img_path=$row['img_path'];
		            ?>
					<div id="<?php echo $cat_id; ?>" class="item-slick2 p-l-15 p-r-15">
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo $img_path; ?>" alt="<?php echo $cat_name; ?>">

								<div class="block1-wrapbtn w-size2">
									<a href="page_dynamic.php?cat=<?php echo $cat_id; ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
										<?php echo $cat_name; ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</section>


	<section class="instagram p-t-40">
		<div class="sec-title p-l-15 p-r-15">
			<br>
			<h3 class="m-text5 t-center">
				Populaire Winkels Vandaag
			</h3>
		</div>
        <div class="container p-t-50">
    		<section class="blog bgwhite populair_winkel">
                <div class="container">
                    <div class="row">
                        <?php
    		            $sql_query = "SELECT * FROM stores WHERE store_show='Yes' AND store_name LIKE '%$search_term%' ORDER BY store_name ASC";
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
                                <a class="block3-img dis-block hov-img-zoom">
                                    <img src="<?php echo $img_path; ?>">
                                </a>

                                <div class="block3-txt p-t-14 ">
                                    <p class="s-text8 p-t-16 ">
										<a href="" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
											Shop By <?php echo $store_name; ?>
										</a>
									</p>
                                </div>
                            </div>
                        </div>
                        	<?php } ?>
                    </div>
                </div>
            </section>
        </div>
	</section>

	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<h3 class="m-text5 t-center">
				Deals
			</h3>
			<br>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $sql_query = "SELECT * FROM deals WHERE experation_stamp >= CURDATE() AND deal_block = 'Block 1' AND deal_name LIKE '%$search_term%'";
                    $result = $conn->query($sql_query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $deal_id = $row['deal_id'];
                            $deal_btn = $row['deal_btn'];
                            $deal_img_path =$row['deal_img_path'];
                    ?>
                    <!-- block1 -->
                    <div id="<?php echo $deal_id; ?>" class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="<?php echo $deal_img_path; ?>" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                             <?php echo $deal_btn; ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-4">
                    <?php
                    $sql_query = "SELECT * FROM deals WHERE experation_stamp >= CURDATE() AND deal_block = 'Block 2'  AND deal_name LIKE '%$search_term%' ";
                    $result = $conn->query($sql_query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $deal_id = $row['deal_id'];
                            $deal_btn = $row['deal_btn'];
                            $deal_img_path =$row['deal_img_path'];
                    ?>
                    <!-- block1 -->
                    <div id="<?php echo $deal_id; ?>" class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="<?php echo $deal_img_path; ?>" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                             <?php echo $deal_btn; ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $sql_query = "SELECT * FROM deals WHERE experation_stamp >= CURDATE() AND deal_block = 'Block 3'  AND deal_name LIKE '%$search_term%' ";
                    $result = $conn->query($sql_query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $deal_id = $row['deal_id'];
                            $deal_btn = $row['deal_btn'];
                            $deal_img_path =$row['deal_img_path'];
                    ?>
                    <!-- block1 -->
                    <div id="<?php echo $deal_id; ?>" class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="<?php echo $deal_img_path; ?>" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                             <?php echo $deal_btn; ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <?php
                    $sql_query = "SELECT * FROM deals WHERE experation_stamp >= CURDATE() AND deal_block = 'Block 4'  AND deal_name LIKE '%$search_term%' ";
                    $result = $conn->query($sql_query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $deal_id = $row['deal_id'];
                            $deal_btn = $row['deal_btn'];
                            $deal_img_path =$row['deal_img_path'];
                    ?>
                    <!-- block1 -->
                    <div id="<?php echo $deal_id; ?>" class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="<?php echo $deal_img_path; ?>" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                             <?php echo $deal_btn; ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

		</div>
	</section>

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>
                <?php
                $sql_query = "SELECT * FROM category ORDER BY cat_name ASC";
                $result = $conn->query($sql_query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $cat_id = $row['category_id'];
                        $cat_name =$row['cat_name'];
                ?>
				<ul>
					<li class="p-b-9">
						<a id="<?php echo $cat_id; ?>" href="page_dynamic.php?cat=<?php echo $cat_id; ?>" class="s-text7">
                            <?php echo $cat_name; ?>
						</a>
					</li>
				</ul>
                <?php } ?>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Home
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Alle Winkels
						</a>
					</li>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Over ons
						</a>
					</li>

				</ul>
			</div>
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
