<?php
    include '../config.php';
    session_start();

    if (isset($_POST['submit'])){

      $cat_name = $_POST['cat_name'];
      $sql = "INSERT INTO category(cat_name) VALUES ('$cat_name')";

      $result = $conn->query($sql);

     header("Location: cat.php");

    }

    $sql_query = "SELECT * FROM category";
    $result = $conn->query($sql_query);

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
                    <li><a class="" href="">Instellingen</a></li>
                    <li><a class="" href="">Uitloggen</a></li>
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
              <i class="ion ion-crop"></i> <span>Lay-out</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i>Beheren</a></li>
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
              <li><a href=""><i class="fa fa-circle-o"></i>Beheren</a></li>
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
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['category_id'];
                    $cat =$row['cat_name'];
            ?>
            <div class="col-xs-3">
                <div value="<?php echo $id; ?>" class="cat_frame">
                    <div class="cat_content">
                        <div class="col-md-9">
                            <h1><?php echo $cat; ?></h1>
                        </div>
                        <div class="col-md-3">
                            <button type="button" name="delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
  <div class="modal fade" id="addCat">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title">Category Toevoegen</h2>
              </div>
              <div class="modal-body">
                  <form class="" method="post">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                <label >Category</label>
                                <input type="text" class="form-control" name="cat_name"  placeholder="">
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
  <script type="text/javascript" src="../vendor/sweetalert/sweetalert.min.js"></script>

</body>
</html>
