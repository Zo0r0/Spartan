'No'<?php
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

 ?>
