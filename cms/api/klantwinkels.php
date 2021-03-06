<?php
    include '../../config.php';
    include '../cookies/navbar_cookie.php';
    include '../cookies/btn-color_cookie.php';
    session_start();
 ?>
 <!DOCTYPE html>
 <html lang="nl">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>SpartanCMS | Webstores</title>
   <link rel="stylesheet" href="../../vendor/sweetalert2/sweetalert2.css">
   <link rel="stylesheet" href="../../css/bootstrap.css">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link rel="stylesheet" href="../../css/cmsMain.css">
   <link rel="stylesheet" href="../../css/_all-skins.min.css">
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
                         <li> <button type="button" onclick="location.href='../instellingen.php';" name="button" style="background-color:transparent; border: 0px;">Instellingen</button> </li>
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

               <li><a href="../index.php"><i class="ion ion-clipboard"></i> <span>Dashboard</span></a></li>

               <li class="treeview active">
                 <a href="">
                   <i class="fa fa-shopping-cart active"></i> <span>Webstores</span>
                   <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                   </span>
                 </a>
                 <ul class="treeview-menu">
                   <li class="active"><a href="../beheer.php"><i class="fa fa-circle-o "></i>Beheerders</a></li>
                   <li><a href="../winkels.php"><i class="fa fa-circle-o"></i>Winkels</a></li>
                   <li><a href="../cat.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
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
                     <li><a href="../cat_content.php"><i class="fa fa-circle-o"></i>Categorieën</a></li>
                     <li><a href="../pwv.php"><i class="fa fa-circle-o"></i>Populaire Winkels Vandaag</a></li>
                     <li><a href="../deals.php"><i class="fa fa-circle-o"></i>Deals</a></li>
                 </ul>
               </li>

             </ul>
         </section>
       </aside>
       <?php
       $sql_user = "SELECT user_id, user_name, user_active FROM users WHERE users.user_id ='{$_GET['id']}'";

       $result_user = $conn->query($sql_user);

           while ($row = mysqli_fetch_assoc($result_user)) {
               $user_id=$row['user_id'];
               $owner = $row['user_name'];
               $user_active = $row['user_active'];
        ?>
       <div class="content-wrapper">
         <section class="content-header">
           <h1>
             Webstores
             <small><?php echo $owner;?>'s paneel</small>
           </h1>
         </section>

         <!-- Main content -->
         <section class="content">
             <div class="row">
                 <div class="col-md-2">
                     <div class="form-group">
                       <label >Beheerder ID</label>
                       <input type="text" class="form-control" name="user_id"  value="<?php echo $user_id;?>" readonly>
                     </div>
                     <div class="form-group">
                       <label >Beheerder Actief</label>
                       <input type="text" class="form-control" name="user_active"  value="<?php echo $user_active;?>" readonly>
                     </div>
               </div>
               <div class="col-md-2">
                   <div class="form-group">
                     <label >Beheerder Naam</label>
                     <input type="text" class="form-control" name="user_name"  value="<?php echo $owner;?>" readonly>
                   </div>
               </div>
             </div>
         <?php } ?>
             <br>
             <div class="row">
                 <div class="col-xs-12">
                   <div class="box">
                     <div class="box-body">
                         <h3>Winkels</h3>
                         <table id="stores" class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                 <th>Winkel ID</th>
                                 <th>Winkel Naam</th>
                                 <th>Category</th>
                                 <th>Actief</th>
                                 <th>Options</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php
                               $sql_store = "SELECT store_id,store_name, cat_name, store_active FROM stores INNER JOIN users ON stores.owner_id = users.user_id INNER JOIN category ON stores.category_id = category.category_id WHERE users.user_id ='{$_GET['id']}'";

                               $result_store = $conn->query($sql_store);

                                     while ($row = mysqli_fetch_assoc($result_store)) {
                                        $store_id = $row['store_id'];
                                        $store_name= $row['store_name'];
                                        $category = $row['cat_name'];
                                        $store_active = $row['store_active']; ?>

                               <tr>
                                   <td><?php echo $store_id; ?></td>
                                   <td><?php echo $store_name; ?></td>
                                   <td><?php echo $category; ?></td>
                                   <td><?php echo $store_active; ?></td>
                                   <td>
                                       <button type="button" name="edit" title="Bewerken" data-toggle="modal" data-target="#editStores" data-id="<?php echo $store_id; ?>" style="color: blue; margin-right: 20px; background-color:transparent; border: 0px;"><i class="fa fa-pencil"></i>
                                       </button>

                                       <button type="button" name="delete" title="Verwijderen"  onclick="storedeactivate('<?php echo $store_id;?>')" style="color: red; background-color:transparent; border: 0px;"> <i class="fa fa-trash"></i></button>
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

      <!-- Edit -->
      <div class="modal fade"  id="editStores">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h2 class="modal-title">Webstore Gegevens Wijzigen</h2>
                  </div>

                    <div class="store_info">

                    </div>

              </div>
          </div>
      </div>
   </div>


   <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
   <script src="../../js/jquery-ui.js"></script>
   <script src="../../js/bootstrap.js"></script>
   <script src="../../js/jquery.slimscroll.min.js"></script>
   <script src="../../js/fastclick.js"></script>
   <script src="../../js/cmsMain.js"></script>
   <script type="text/javascript" src="../../vendor/sweetalert2/sweetalert2.js"></script>
   <script type="text/javascript">

     $('#editStores').on('show.bs.modal', function (event) {
           var button = $(event.relatedTarget) // Button that triggered the modal
           var recipient = button.data('id') // Extract info from data-* attributes
           var modal = $(this);
           var dataString = 'id=' + recipient;
             $.ajax({
                 type: "GET",
                 url: "edit/editWinkels.php",
                 data: dataString,
                 cache: false,
                 success: function (data) {
                     console.log(data);
                     modal.find('.store_info').html(data);
                 },
                 error: function(err) {
                     console.log(err);
                 }
             });
     })
   </script>
 </body>
 </html>
