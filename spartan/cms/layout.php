<?php
include '../config.php';
session_start();
include 'cookies/navbar_cookie.php';
include 'cookies/btn-color_cookie.php';

if (isset($_POST['submit'])){

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users(user_name,username,password,accesslevel) VALUES ('$name $surname','$username','$password','1')";

  $result = $conn->query($sql);

 header("Location: instellingen.php");

}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SpartanCMS | Instellingen</title>
    <link rel="stylesheet" href="../vendor/sweetalert2/sweetalert2.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="../css/cmsMain.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
  </head>
  <body class="hold-transition skin-<?php echo $_COOKIE['color']; ?> sidebar-mini">
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
                        <li> <button type="button" onclick="location.href='index.php';" name="button" style="background-color:transparent; border: 0px;">Dashboard</button> </li>
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

              <li><a href="instellingen.php"><i class="fa fa-group"></i> <span>SPARTAN Beheerders</span></a></li>

            </ul>  
            <ul class="sidebar-menu" data-widget="tree">
   

              <li class="active"><a href="layout.php"><i class="fa fa-adjust"></i> <span>Thema Aanpassingen</span></a></li>

            </ul>
        </section>
  

          
      </aside>
        <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Thema Aanpassingen
            <small>Thema aanpassing paneel</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
      
          <section>
          <div class="sec-title p-b-60">
            <br>
            <h3 class="m-text5 t-center">
                 <center><span>
            <p>Navigatiebalk kleur aanpassen:</p>

            <a href="?color=green"><img src="../images/green.jpg"  width="50" height="50"></a>
            <a href="?color=red"><img src="../images/red.jpg"  width="50" height="50"></a>
            <a href="?color=yellow"><img src="../images/yellow.jpg"  width="50" height="50"></a>
            <a href="?color=blue"><img src="../images/blue.jpg"  width="50" height="50"></a>

            </span></center>
            </h3>
          </div>
         </section>


           <section>
          <div class="sec-title p-b-60">
            <br>
            <h3 class="m-text5 t-center">
                 <center><span>
            <p>Knoppen kleur aanpassen:</p>

            <a href="?btn-color=success"><img src="../images/green.jpg"  width="50" height="50"></a>
            <a href="?btn-color=danger"><img src="../images/red.jpg"  width="50" height="50"></a>
            <a href="?btn-color=warning"><img src="../images/yellow.jpg"  width="50" height="50"></a>
            <a href="?btn-color=info"><img src="../images/blue.jpg"  width="50" height="50"></a>

            </span></center>
            </h3>
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
  
  </body>
</html>
