<?php
include '../../../config.php';

    if (isset($_POST['updaten'])) {

      $store_id = $row['store_id'];
      $store_name= $row['store_name'];
      $category = $row['cat_name'];


      // $query = "UPDATE stores SET store_name = '$store_name'";

      echo $store_name;
      // $result = $conn->query($query);
      // header("location:../klantenwinkels.php");

    } 

    // else {
    //     $store_id = $_GET['id'];

    //     $sql_query = ("SELECT store_id, store_name FROM stores INNER JOIN category ON stores.owner_id = category.category_id WHERE store_id.category_id = '$_GET['id']'");


    //     $result = $conn->query($sql_query);
    //     $row = mysqli_fetch_assoc($result);
    // }
?>

<form method="POST" action="api/edit/editWinkels.php" role="form">
 <div class="modal-body">
  <!--  -->
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label >Winkel Naam</label>
        <input type="text" class="form-control" id="store_name" name="store_name" value="<?php echo $row['store_name']; ?>" autocomplete="off">
      </div>
    </div>
  </div>
 <!--  -->
</div>
<div class="modal-footer">
    <input type="submit" name="updaten" class="btn btn-primary" id="updaten" value="Updaten">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</form>
