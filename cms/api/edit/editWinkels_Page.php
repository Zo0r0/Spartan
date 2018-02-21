<?php
include '../../../config.php';
    if (isset($_POST['updaten'])) {
      $store_id = $_POST['store_id'];
      $store_name= $_POST['store_name'];
      $category_id = $_POST['category_id'];

      $query = "UPDATE stores SET store_name = '$store_name', category_id = '$category_id' WHERE store_id = '$store_id'";
      $result = $conn->query($query);

      header("location:../../winkels.php");
    }
    else {
        $store_id = $_GET['id'];

        $sql_query = "SELECT * FROM stores WHERE store_id = '$store_id'";
        $result = $conn->query($sql_query);
        $row = mysqli_fetch_assoc($result);
    }
?>

<form method="POST" action="api/edit/editWinkels_Page.php" role="form">
 <div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label >ID</label>
        <input type="text" class="form-control" name="store_id" value="<?php echo $store_id; ?>" readonly="true">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label >Winkel Naam</label>
        <input type="text" class="form-control" id="store_name" name="store_name" value="<?php echo $row['store_name']; ?>"  autocomplete="off">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">

        <select class="form-control"  name="category_id">
                                    <?php
                                        $sql2_query = "SELECT * FROM category";
                                        $result3 = $conn->query($sql2_query);
                                        while ($row = mysqli_fetch_assoc($result3)){
                                          $cat_id= $row['category_id'];
                                          $cat =  $row['cat_name'];
                                     ?>
                                     <option value="<?php echo $cat_id; ?>"><?php echo $cat; ?></option>

                                   <?php } ?>
          </select>

      </div>
    </div>
  </div>

</div>
<div class="modal-footer">
    <input type="submit" name="updaten" class="btn btn-primary" id="updaten" value="Updaten">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</form>
