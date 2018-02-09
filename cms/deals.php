<?php
    include '../config.php';
    session_start();

    if (isset($_POST['block1'])){

      $discription = $_POST['deal_dis1'];
      $exp_stamp = $_POST['exp_stamp1'];
      // print_r($file);
      $fileName = $_FILES['img1']['name'];
      $fileTmp = $_FILES['img1']['tmp_name'];
      $fileSize = $_FILES['img1']['size'];
      $fileError = $_FILES['img1']['error'];
      $fileType = $_FILES['img1']['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize < 1000000) {
              $fileNameNew = rand(100,400).".".$fileActualExt;
              $fileDestention = '../img/deals/'.$fileNameNew;

              move_uploaded_file($fileTmp, $fileDestention);

              $sql = "INSERT INTO deals(deal_discription ,deal_img_path ,deal_block, experation_stamp) VALUES ('$discription','$fileDestention','Block 1','$exp_stamp')";

              $result = $conn->query($sql);

              header("Location: deals.php");
            }
        }
    }
}

if (isset($_POST['block2'])){

  $discription = $_POST['deal_dis2'];
  $exp_stamp = $_POST['exp_stamp2'];
  // print_r($file);
  $fileName = $_FILES['img2']['name'];
  $fileTmp = $_FILES['img2']['tmp_name'];
  $fileSize = $_FILES['img2']['size'];
  $fileError = $_FILES['img2']['error'];
  $fileType = $_FILES['img2']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000) {
          $fileNameNew = rand(100,400).".".$fileActualExt;
          $fileDestention = '../img/deals/'.$fileNameNew;

          move_uploaded_file($fileTmp, $fileDestention);

          $sql = "INSERT INTO deals(deal_discription ,deal_img_path ,deal_block, experation_stamp) VALUES ('$discription','$fileDestention','Block 2','$exp_stamp')";

          $result = $conn->query($sql);

          header("Location: deals.php");
        }
    }
}
}

if (isset($_POST['block3'])){

  $discription = $_POST['deal_dis3'];
  $exp_stamp = $_POST['exp_stamp3'];
  // print_r($file);
  $fileName = $_FILES['img3']['name'];
  $fileTmp = $_FILES['img3']['tmp_name'];
  $fileSize = $_FILES['img3']['size'];
  $fileError = $_FILES['img3']['error'];
  $fileType = $_FILES['img3']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000) {
          $fileNameNew = rand(100,400).".".$fileActualExt;
          $fileDestention = '../img/deals/'.$fileNameNew;

          move_uploaded_file($fileTmp, $fileDestention);

          $sql = "INSERT INTO deals(deal_discription ,deal_img_path ,deal_block, experation_stamp) VALUES ('$discription','$fileDestention','Block 3','$exp_stamp')";

          $result = $conn->query($sql);

          header("Location: deals.php");
        }
    }
}
}

if (isset($_POST['block4'])){

  $discription = $_POST['deal_dis4'];
  $exp_stamp = $_POST['exp_stamp4'];
  // print_r($file);
  $fileName = $_FILES['img4']['name'];
  $fileTmp = $_FILES['img4']['tmp_name'];
  $fileSize = $_FILES['img4']['size'];
  $fileError = $_FILES['img4']['error'];
  $fileType = $_FILES['img4']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000) {
          $fileNameNew = rand(100,400).".".$fileActualExt;
          $fileDestention = '../img/deals/'.$fileNameNew;

          move_uploaded_file($fileTmp, $fileDestention);

          $sql = "INSERT INTO deals(deal_discription ,deal_img_path ,deal_block, experation_stamp) VALUES ('$discription','$fileDestention','Block 4','$exp_stamp')";

          $result = $conn->query($sql);

          header("Location: deals.php");
        }
    }
}
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.csss">
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
              <li><a href=""><i class="fa fa-circle-o"></i>Kleuren</a></li>
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
                <li><a href="cat_content.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
                <li><a href="pwv.php"><i class="fa fa-circle-o"></i>Populaire Winkels Vandaag</a></li>
                <li class="active"><a href="deals.php"><i class="fa fa-circle-o"></i>Deals</a></li>
            </ul>
          </li>

        </ul>
    </section>
  </aside>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Content
        <small>Deals paneel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <center>
                    <div class="block1">
                        <h4>Block 1</h4> <br>
                        <p>Deze afbeelding moet minimaal een breedte hebben van 720px.<br>En een hoogte van 328px. </p><br>

                         <form class="" method="post" enctype="multipart/form-data">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="width: 50%;">
                                       <label >Beschrijving van deze deal</label>
                                       <input type="text" class="form-control" name="deal_dis1"  placeholder="">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="width: 50%;">
                                       <label >Deal Experation</label>
                                       <input type="text" data-provide="datepicker" class="form-control" name="exp_stamp1" id="exp_stamp"  placeholder="">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Deal Afbeelding</label>
                                     <input type="file" name="img1" class="form-control-file">
                                 </div>
                             </div><br>
                             <input type="submit" name="block1" class="btn btn-primary" value="Voeg Toe">
                         </form>
                    </div>
                </center>
            </div>
            <div class="col-md-6">
                <center>
                    <div class="block1">
                        <h4>Block 2</h4> <br>
                        <p>Deze afbeelding moet minimaal een breedte hebben van 320px.<br>En een hoogte van 328px. </p><br>

                         <form class="" method="post" enctype="multipart/form-data">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="width: 50%;">
                                       <label >Beschrijving van deze deal</label>
                                       <input type="text" class="form-control" name="deal_dis2"  placeholder="">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="width: 50%;">
                                       <label >Deal Experation</label>
                                       <input type="text" data-provide="datepicker" class="form-control" name="exp_stamp2" id="exp_stamp"  placeholder="">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Deal Afbeelding</label>
                                     <input type="file" name="img2" class="form-control-file">
                                 </div>
                             </div><br>
                             <input type="submit" name="block2" class="btn btn-primary" value="Voeg Toe">
                         </form>
                    </div>
                </center>
            </div>
        </div>
        <div class="row" style="margin-top:40px;">
            <div class="col-md-6">
                <center>
                    <div class="block1">
                        <h4>Block 3</h4> <br>
                        <p>Deze afbeelding moet minimaal een breedte hebben van 520px.<br>En een hoogte van 328px. </p><br>

                         <form class="" method="post" enctype="multipart/form-data">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="width: 50%;">
                                       <label >Beschrijving van deze deal</label>
                                       <input type="text" class="form-control" name="deal_dis3"  placeholder="">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="width: 50%;">
                                       <label >Deal Experation</label>
                                       <input type="text" data-provide="datepicker" class="form-control" name="exp_stamp3" id="exp_stamp"  placeholder="">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Deal Afbeelding</label>
                                     <input type="file" name="img3" class="form-control-file">
                                 </div>
                             </div><br>
                             <input type="submit" name="block3" class="btn btn-primary" value="Voeg Toe">
                         </form>
                    </div>
                </center>
            </div>
            <div class="col-md-6">
                <center>
                    <div class="block1">
                        <h4>Block 4</h4> <br>
                        <p>Deze afbeelding moet minimaal een breedte hebben van 520px.<br>En een hoogte van 328px. </p><br>

                         <form class="" method="post" enctype="multipart/form-data">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="width: 50%;">
                                       <label >Beschrijving van deze deal</label>
                                       <input type="text" class="form-control" name="deal_dis4" placeholder="">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group" style="width: 50%;">
                                       <label >Deal Experation</label>
                                       <input type="text" data-provide="datepicker" class="form-control" name="exp_stamp4" id="exp_stamp"  placeholder="">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Deal Afbeelding</label>
                                     <input type="file" name="img4" class="form-control-file">
                                 </div>
                             </div><br>
                             <input type="submit" name="block4" class="btn btn-primary" value="Voeg Toe">
                         </form>
                    </div>
                </center>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $('input#exp_stamp').datepicker({
            format: "yyyy/mm/dd",
            language: "nl",
            multidate: false
        });
    </script>
</body>
</html>