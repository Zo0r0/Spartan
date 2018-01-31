<?php

    include '../../config.php';
// Logout
if (isset($_GET['logout'])) {
    $sql = "INSERT INTO log(attempt,username,success) VALUES ('logout','$_SESSION['user_name']','Yes')";
    $result = $conn->query($sql);
    session_destroy();
    header('Location:../../store/index.php');
}
}

// Restore
if (isset($_GET['restoreuser'])) {
    $sql = "UPDATE users SET user_active = 'Y' WHERE user_id = '{$_GET['id']}'";

if (mysqli_query($conn,$sql)) {
  header("Location:../beheer.php");
}
}


// Deactivate
    if (isset($_GET['userdeactivate'])) {
    	$sql = "UPDATE users, stores SET users.user_active = 'N', stores.store_active ='N' WHERE user_id = '{$_GET['id']}' AND owner_id ='{$_GET['id']}'";

    if (mysqli_query($conn,$sql)) {
      header("Location:../beheer.php");
    }
    }

    if (isset($_GET['storedeactivate'])) {
        $sql = "UPDATE stores SET store_active = 'N' WHERE store_id = '{$_GET['id']}'";

    if (mysqli_query($conn,$sql)) {
      header("Location:../winkels.php");
    }
    }

 ?>
