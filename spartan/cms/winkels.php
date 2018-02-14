<?php
    include '../config.php';
    session_start();

    include 'cookies/navbar_cookie.php';
    include 'cookies/btn-color_cookie.php';

    if (isset($_POST['submit'])){

      $owner = $_POST['owner_id'];
      $name = $_POST['name'];
      $categoryid = $_POST['category_id'];
      // print_r($file);
      $fileName = $_FILES['img']['name'];
      $fileTmp = $_FILES['img']['tmp_name'];
      $fileSize = $_FILES['img']['size'];
      $fileError = $_FILES['img']['error'];
      $fileType = $_FILES['img']['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize < 1000000) {
              $fileNameNew = rand(100,400).".".$fileActualExt;
              $fileDestention = '../img/stores/'.$fileNameNew;

              move_uploaded_file($fileTmp, $fileDestention);

              $sql = "INSERT INTO stores(owner_id,store_name, store_img_path, category_id) VALUES ('$owner','$name','$fileDestention','$categoryid')";

              $result = $conn->query($sql);

              header("Location: winkels.php");
            }
        }
    }
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SpartanCMS | Webstores</title>
    <link rel="stylesheet" href="../vendor/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="../css/ionicons.css">
  <link rel="stylesheet" href="../css/cmsMain.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
</head>

<body class="hold-transition skin-<?php echo $_COOKIE['color']; ?>  sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="" class="logo">
        <span class="logo-mini">CMS</span>
        <span class="logo-lg"><b>SPARTAN</b>CMS</span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigatie</span>
      </a>
      <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
              <li class="user user-menu">
                <a>
                  <span class="hidden-xs"><?php echo $_SESSION['user_name']; ?></span>
                </a>
              </li>
              <li>
                <a href="" data-toggle="dropdown"><i class="fa fa-gears"></i></a>
                <ul class="dropdown-menu">
                    <li> <button type="button" onclick="location.href='instellingen.php';" name="button" style="background-color:transparent; border: 0px;">Instellingen</button> </li>
                    <li> <button type="button" onclick="logout();" name="button" style="background-color:transparent; border: 0px;">Uitloggen</button> </li>
                </ul>
              </li>
          </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">NAVIGATIE</li>

          <li><a href="index.php"><i class="ion ion-clipboard"></i> <span>Dashboard</span></a></li>

          <li class="treeview active">
            <a href="">
              <i class="fa fa-shopping-cart active"></i> <span>Webstores</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="beheer.php"><i class=" fa fa-circle-o "></i>Beheerders</a></li>
              <li class="active"><a href="winkels.php"><i class="fa fa-circle-o"></i>Winkels</a></li>
              <li><a href="cat.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="">
              <i class="fa fa-comments"></i> <span>Content</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="cat_content.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
                <li><a href="pwv.php"><i class="fa fa-circle-o"></i>Populaire Winkels Vandaag</a></li>
                <li><a href="deals.php"><i class="fa fa-circle-o"></i>Deals</a></li>
            </ul>
          </li>

        </ul>
    </section>
  </aside>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Webstores
        <small>Winkels paneel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-2 col-xs-3">
            <div class="box-nb">
                <button type="button" name="button" class="add btn btn-<?php echo $_COOKIE['btn-color']; ?>"" data-toggle="modal" data-target="#addStore"><i class="fa fa-plus fa-2x"></i></button>
            </div>
          </div>
        </div>
        <div class="row">
            <?php
            $sql_query = "SELECT store_id,user_name, store_name, cat_name, user_active FROM stores INNER JOIN users ON stores.owner_id = users.user_id INNER JOIN category ON stores.category_id = category.category_id WHERE users.user_active ='Yes' AND stores.store_active ='Yes' ";
            $result1 = $conn->query($sql_query);

                while ($row = mysqli_fetch_assoc($result1)) {
                    $id =$row['store_id'];
                    $owner = $row['user_name'];
                    $store_name= $row['store_name'];
                    $category = $row['cat_name'];
            ?>
            <div class="col-xs-3">
                <div class="store_frame">
                    <div class="store_content">
                        <div value="<?php echo $id; ?>" class="col-md-12">
                            <h1><?php echo $store_name; ?></h1>
                            <h4>Owner: <?php echo $owner; ?></h4>
                            <p>Category: <?php echo $category; ?></p>
                            <button type="button" name="button" class="btn btn-danger" onclick="storedeactivate('<?php echo $id;?>')">Deactiveren</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <?php
            $sql_query = "SELECT store_id,user_name, store_name, cat_name, user_active FROM stores INNER JOIN users ON stores.owner_id = users.user_id INNER JOIN category ON stores.category_id = category.category_id WHERE users.user_active ='Yes' AND stores.store_active ='No'";
            $result1 = $conn->query($sql_query);

                while ($row = mysqli_fetch_assoc($result1)) {
                    $id =$row['store_id'];
                    $owner = $row['user_name'];
                    $store_name= $row['store_name'];
                    $category = $row['cat_name'];
            ?>
            <div class="col-xs-3">
                <div class="store_frame_deactive">
                    <div class="store_content">
                        <div value="<?php echo $id; ?>" class="col-md-12">
                            <h1><?php echo $store_name; ?></h1>
                            <h4>Owner: <?php echo $owner; ?></h4>
                            <p>Category: <?php echo $category; ?></p>
                            <button type="button" name="button" class="btn btn-success" onclick="storeactivate('<?php echo $id;?>')">Activeren</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- /.Content -->
  </div>


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
  </footer>

  <!-- Modals -->

  <div class="modal fade" id="addStore">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title">Winkel Toevoegen</h2>
              </div>
              <div class="modal-body">
                  <form class="" method="post" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label >Beheerder</label>

                                <select class="form-control" name="owner_id">
                                    <?php
                                        $sql1_query = "SELECT * FROM users WHERE accesslevel='0' AND user_active='Yes'";

                                        $result2 = $conn->query($sql1_query);

                                        while ($row = mysqli_fetch_assoc($result2)){
                                          $owner_id= $row['user_id'];
                                          $name =  $row['user_name'];
                                     ?>

                                     <option value="<?php echo $owner_id; ?>"><?php echo $name; ?></option>

                                   <?php } ?>
                                </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label >Naam Winkel</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter u winkel naam" autocomplete="off" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <label>Winkel Logo</label>
                              <input type="file" name="img" class="form-control-file">
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label >Category</label>
                                <select class="form-control" multiple="multiple" name="category_id">
                                    <?php
                                        $sql2_query = "SELECT * FROM category";

                                        $result3 = $conn->query($sql2_query);

                                        while ($row = mysqli_fetch_assoc($result3)){
                                          $cat_id= $row['category_id'];
                                          $cat =  $row['cat_name'];
                                     ?>
                                     <option value="<?php echo $cat_id; ?>"><?php echo $cat; ?></option>

                                   <?php } ?>
                                </select>
                              </div>
                          </div>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Voeg Toe">
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>




  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/bootstrap-datepicker.min.js"></script>
  <script src="../js/jquery.slimscroll.min.js"></script>
  <script src="../js/fastclick.js"></script>
  <script src="../js/cmsMain.js"></script>
  <script type="text/javascript" src="../vendor/sweetalert2/sweetalert2.js"></script>
</body>
</html>
