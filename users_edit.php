<?php
include 'basic.php';
if (isset($_POST["fullname"])) {
  users_update($_POST["id"],$_POST["fullname"],$_POST["username"],$_POST["password"],$_POST["admin"]);
}
$user=users_edit($_GET["id"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit User</title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <form action="users_edit.php" method="post" enctype="multipart/form-data">
      <div class="container">
      <h1 class="display-1 text-primary">Edit Customer</h1>
      <input class="form-control" type="hidden" name="id" value="<?php echo $user["id"]; ?>"><br>
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input class="form-control" type="text" name="fullname" value="<?php echo $user["fullname"]; ?>" ><br>
          <div class="form-group">
              <label for="username">User Name</label>
              <input class="form-control" type="text" name="username" value="<?php echo $user["username"]; ?>"><br>
              <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" value="<?php echo $user["password"]; ?>"><br>
              <div class="form-group">
              <label for="admin">Admin</label>
              <input class="form-control" type="text" name="admin" value="<?php echo $user["admin"]; ?>"><br>
              <button type="submit" name="button" class="btn btn-dark">Save</button>
              <a href="#" class="btn btn-dang">Back</a>
    </div>
    </form>
  </body>
</html>
