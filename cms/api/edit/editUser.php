<?php
include '../../../config.php';

    if (isset($_POST['updaten'])) {

      $id = $_POST['id'];
      $name = $_POST['name'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $query = "UPDATE users SET user_name = '$name', username = '$username', password='$password' WHERE user_id=$id";
      $result = $conn->query($query);
      header("location:../../beheer.php");

    } else {
        $id = $_GET['id'];

        $sql_query = ("SELECT * FROM users WHERE user_id = '$id'");

        $result = $conn->query($sql_query);
        $row = mysqli_fetch_assoc($result);
    }
?>

<form method="POST" action="api/edit/editUser.php" role="form">
 <div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label >ID</label>
        <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" readonly="true">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label >Naam</label>
        <input type="text" class="form-control" id="name" name="name"  value="<?php echo $row['user_name']; ?>" autocomplete="off">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label >Usernaam</label>
        <input type="text" class="form-control" id="username" name="username"  value="<?php echo $row['username']; ?>" autocomplete="off">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label >Wachtwoord</label>
        <input type="text" class="form-control" id="password" name="password"  value="<?php echo $row['password']; ?>"  autocomplete="off">
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
    <input type="submit" name="updaten" class="btn btn-primary" id="updaten" value="Updaten">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</form>
