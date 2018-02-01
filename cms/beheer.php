<?php
    include '../config.php';
    session_start();

    if (isset($_POST['submit'])){

      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "INSERT INTO users(user_name,username,password) VALUES ('$name $surname','$username','$password')";

      $result = $conn->query($sql);

     header("Location: beheer.php");

    }

 ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SpartanCMS | Webstores</title>
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
                    <li><a class="" href="">Instellingen</a></li>
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
              <li class="active"><a href="beheer.php"><i class="fa fa-circle-o "></i>Beheerders</a></li>
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

          <li class="treeview">
            <a href="">
              <i class="fa fa-comments"></i> <span>Content</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="cat_content.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
                <li><a href=""><i class="fa fa-circle-o"></i>Populaire Winkels Vandaag</a></li>
                <li><a href=""><i class="fa fa-circle-o"></i>Deals</a></li>
            </ul>
          </li>

        </ul>
    </section>
  </aside>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Webstores
        <small>Beheerders paneel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-2 col-xs-3">
            <div class="box-nb">
                <button type="button" name="button" class="add btn btn-danger" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                    <h3>Geactiveerde Beheerders</h3>
                  <table id="users" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Naam</th>
                          <th>Usernaam</th>
                          <th>Wachtwoord</th>
                          <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_query = "SELECT * FROM users WHERE accesslevel = '0' AND user_active = 'Yes'";
                        $result = $conn->query($sql_query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $id =$row['user_id'];
                                $name = $row['user_name'];
                                $username= $row['username'];
                                $password = $row['password'];
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $password; ?></td>
                            <td>
                                <button type="button" name="view" title="Bezichtigen"  onclick="location.href='api/klantwinkels.php?id=<?php echo $id;?>'" style="color:orange ; margin-right: 20px; background-color:transparent; border: 0px;"> <i class="fa fa-book"></i></button>
                                <button type="button" name="edit" title="Bewerken" onclick="" style="color: blue; margin-right: 20px; background-color:transparent; border: 0px;"><i class="fa fa-pencil"></i></button>
                                <button type="button" name="delete" title="Deactiveren"  onclick="userdeactivate('<?php echo $id;?>')" style="color: red; background-color:transparent; border: 0px;"> <i class="fa fa-trash"></i></button>
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
                    <h3>Gedeactiveerde Beheerders</h3>
                  <table id="users_inactive" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Naam</th>
                          <th>Usernaam</th>
                          <th>Wachtwoord</th>
                          <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_query = "SELECT * FROM users WHERE accesslevel = '0' AND user_active = 'No'";
                        $result = $conn->query($sql_query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $id =$row['user_id'];
                                $name = $row['user_name'];
                                $username= $row['username'];
                                $password = $row['password'];
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $password; ?></td>
                            <td>
                                <button type="button" name="view" title="Bezichtigen"  onclick="location.href='api/klantwinkels.php?id=<?php echo $id;?>';" style="color:orange ; margin-right: 20px; background-color:transparent; border: 0px;"> <i class="fa fa-book"></i></button>
                                <button type="button" name="edit" title="Bewerken" onclick="" style="color: blue; margin-right: 20px; background-color:transparent; border: 0px;"><i class="fa fa-pencil"></i></button>
                                <button type="button" name="activate" title="Activeren"  onclick="useractivate('<?php echo $id;?>')" style="color: green; background-color:transparent; border: 0px;"> <i class="fa fa-check"></i></button>
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

  <!-- Modals -->
  <div class="modal fade" id="addUser">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title">Gebruiker Toevoegen</h2>
              </div>
              <div class="modal-body">
                  <form class="" method="post">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label >Voornaam</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter naam">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label >Achternaam</label>
                                <input type="text" class="form-control" name="surname"  placeholder="Enter achternaam">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label >Usernaam</label>
                                <input type="text" class="form-control" name="username"  placeholder="Enter usernaam">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label >Wachtwoord</label>
                                <input type="password" class="form-control" name="password"  placeholder="Enter wachtwoord">
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

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/jquery.slimscroll.min.js"></script>
  <script src="../js/fastclick.js"></script>
  <script src="../js/cmsMain.js"></script>
  <script type="text/javascript" src="../vendor/sweetalert2/sweetalert2.js"></script>
  <script type="text/javascript" src="../vendor/dataTables/datatables.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('#users, #users_inactive').DataTable({
          "paging":   true,
          "pagingType": "numbers",
          "ordering": false,
          "info":     false
      });
  } );
  </script>
</body>
</html>
