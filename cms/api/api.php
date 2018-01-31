<?php
    include '../../config.php';
    session_start();
// Logout
if (isset($_GET['logout'])) {
    $username =$_SESSION['username'];

    $sql = "INSERT INTO logfile(attempt,username,success) VALUES ('logout','$username','Yes')";

    if (mysqli_query($conn,$sql)) {

      session_destroy();
     header('Location:../../store/index.php');
    }
}


// Restore
if (isset($_GET['restoreuser'])) {
    $sql = "UPDATE users SET user_active = 'Yes' WHERE user_id = '{$_GET['id']}'";

if (mysqli_query($conn,$sql)) {
  header("Location:../beheer.php");
}
}


// Deactivate
    if (isset($_GET['userdeactivate'])) {
    	$sql = "UPDATE users, stores SET users.user_active = 'No', stores.store_active ='No' WHERE user_id = '{$_GET['id']}' AND owner_id ='{$_GET['id']}'";

    if (mysqli_query($conn,$sql)) {
      header("Location:../beheer.php");
    }
    }

    if (isset($_GET['storedeactivate'])) {
        $sql = "UPDATE stores SET store_active = 'No' WHERE store_id = '{$_GET['id']}'";

    if (mysqli_query($conn,$sql)) {
      header("Location:../winkels.php");
    }
    }

// Selecteren
if (isset($_GET['catselect'])) {
    $sql = "UPDATE category SET cat_show = 'Yes' WHERE category_id = '{$_GET['id']}'";

if (mysqli_query($conn,$sql)) {
  header("Location:../cat_content.php");
}
}

if (isset($_GET['storeselect'])) {
    $sql = "UPDATE stores SET store_show = 'Yes' WHERE store_id = '{$_GET['id']}'";

if (mysqli_query($conn,$sql)) {
  header("Location:../pwv.php");
}
}

// Deselecteren
if (isset($_GET['catdeselect'])) {
    $sql = "UPDATE category SET cat_show = 'No' WHERE category_id = '{$_GET['id']}'";

if (mysqli_query($conn,$sql)) {
  header("Location:../cat_content.php");
}
}

if (isset($_GET['storedeselect'])) {
    $sql = "UPDATE stores SET store_show = 'No' WHERE store_id = '{$_GET['id']}'";

if (mysqli_query($conn,$sql)) {
  header("Location:../pwv.php");
}
}
 ?>
