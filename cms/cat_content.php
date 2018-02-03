<?php
    include '../config.php';
    session_start();

 ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SpartanCMS | Content</title>
  <link rel="stylesheet" href="../vendor/datatables/datatables.css">
  <link rel="stylesheet" href="../vendor/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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

          <li class="treeview ">
            <a href="">
              <i class="fa fa-shopping-cart active"></i> <span>Webstores</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="beheer.php"><i class="fa fa-circle-o "></i>Beheerders</a></li>
              <li><a href="winkels.php"><i class="fa fa-circle-o"></i>Winkels</a></li>
              <li><a href="cat.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
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

          <li class="treeview active">
            <a href="">
              <i class="fa fa-comments"></i> <span>Content</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="cat_content.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
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
        Content
        <small>Categorieën paneel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                    <h3>Geselecteerde Categorieën</h3>
                  <table id="cat_content_active" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_query = "SELECT * FROM category WHERE cat_show='Yes'";
                        $result = $conn->query($sql_query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $cat_id =$row['category_id'];
                                $cat_name = $row['cat_name'];
                        ?>
                        <tr>
                            <td><?php echo $cat_id; ?></td>
                            <td><?php echo $cat_name; ?></td>
                            <td>
                                <button type="button" name="deselect" title="Deselecteren"  onclick="catdeselect('<?php echo $cat_id;?>')" style="color: red; background-color:transparent; border: 0px;"> <i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                    <h3>Gedeselecteerde Categorieën</h3>
                  <table id="cat_content_active" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_query = "SELECT * FROM category WHERE cat_show='No'";
                        $result = $conn->query($sql_query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $cat_id =$row['category_id'];
                                $cat_name = $row['cat_name'];
                        ?>
                        <tr>
                            <td><?php echo $cat_id; ?></td>
                            <td><?php echo $cat_name; ?></td>
                            <td>
                                <button type="button" name="select" title="Selecteren"  onclick="catselect('<?php echo $cat_id;?>')" style="color: orange; background-color:transparent; border: 0px;"> <i class="fa fa-check"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

    </section>
    <!-- /.Content -->
  </div>

   <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/jquery.slimscroll.min.js"></script>
  <script src="../js/fastclick.js"></script>
  <script src="../js/cmsMain.js"></script>
  <script type="text/javascript" src="../vendor/sweetalert2/sweetalert2.js"></script>
  <script type="text/javascript" src="../vendor/dataTables/datatables.js"></script>

</body>
</html>
