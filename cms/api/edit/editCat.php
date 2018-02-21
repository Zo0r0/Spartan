<?php
include '../../../config.php';

    if (isset($_POST['updaten'])) {
      $cat_id = $_POST['cat_id'];
      $cat_name = $_POST['cat_name'];

      $query = "UPDATE category SET cat_name = '$cat_name' WHERE category_id = '$cat_id'";
      $result = $conn->query($query);

      header("location:../../cat.php");
    }
    else {
        $cat_id = $_GET['id'];

        $sql_query = "SELECT * FROM category WHERE category_id = '$cat_id'";
        $result_cat = $conn->query($sql_query);
        $row = mysqli_fetch_assoc($result_cat);
    }
?>

<form method="POST" action="api/edit/editCat.php" role="form">
 <div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label >ID</label>
        <input type="text" class="form-control" name="cat_id" value="<?php echo $cat_id; ?>" readonly="true">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label >Categorie</label>
        <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo $row['cat_name']; ?>"  autocomplete="off">
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
    <input type="submit" name="updaten" class="btn btn-primary" id="updaten" value="Updaten">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</form>
