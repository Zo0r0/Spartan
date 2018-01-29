<?php

    include '../config.php';

    if (isset($_GET['userdeleted'])) {
    	$sql = "UPDATE users SET user_active = 'N' WHERE user_id = '{$_GET['id']}'";

    if (mysqli_query($conn,$sql)) {
      header("Location:beheer.php");
    }
    }

    if (isset($_GET['storedeleted'])) {
        $sql = "UPDATE stores SET store_active = 'N' WHERE store_id = '{$_GET['id']}'";

    if (mysqli_query($conn,$sql)) {
      header("Location:winkels.php");
    }
    }

 ?>
