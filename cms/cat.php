<?php
    include '../config.php';
    session_start();

    if (isset($_POST['submit']) ){

      $cat_name = $_POST['cat_name'];
      $file = $_FILES['img'];
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
              $fileDestention = '../img/cat/'.$fileNameNew;

              move_uploaded_file($fileTmp, $fileDestention);

              $sql = "INSERT INTO category(cat_name, img_path) VALUES ('$cat_name', '$fileDestention')";

              $result = $conn->query($sql);

             header("Location: cat.php");
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
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="../css/ionicons.css">
  <link rel="stylesheet" href="../css/cmsMain.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
</head>

<body class="hold-transition skin-red sidebar-mini">
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
              <li><a href="winkels.php"><i class=" fa fa-circle-o"></i>Winkels</a></li>
              <li class="active"><a href="cat.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
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
        <small>Categorie paneel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-2 col-xs-3">
            <div class="box-nb">
                <button type="button" name="button" class="add btn btn-primary" data-toggle="modal" data-target="#addCat"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
        <div class="row">
            <?php
            $sql_query = "SELECT * FROM category  ORDER BY category.cat_name ASC";
            $result = $conn->query($sql_query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['category_id'];
                    $cat =$row['cat_name'];
            ?>
            <div class="col-xs-2">
                <div value="<?php echo $id; ?>" class="cat_frame">
                    <div class="cat_content">
                        <center>
                            <div class="col-md-12">
                                <h3><?php echo $cat; ?></h3>
                            </div>
                        </center>
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
  <div class="modal fade" id="addCat">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title">Category Toevoegen</h2>
              </div>
              <div class="modal-body">
                  <form class="" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label >Category</label>
                                <input type="text" class="form-control" name="cat_name"  placeholder="" autocomplete="off" required>
                              </div>
                              <div class="form-group">
                                <label >Category Afbeelding</label>
                                <input type="file" class="form-control" name="img"  placeholder="">
                              </div>
                          </div>
                          <div class="col-md-6">

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
  <script type="text/javascript" src="../vendor/sweetalert/sweetalert.min.js"></script>
 
</body>
</html>
