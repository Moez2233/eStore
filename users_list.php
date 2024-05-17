<?php
include 'basic.php';
if (isset($_GET["id"])) {
  users_delete($_GET["id"]);
}
$data=users_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User List - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php';?>
    <div class="container">
  <h1 class="display-1 text-primary">users List</h1>
    <table class="table table-dark table-bordered table-striped ">
      <tr>
      <td><b>Full Name</b></td>
      <td><b>User Name</b></td>
      <td><b>Password</b></td>
      <td><b>Adimn</b></td>
      <td><b>Actions</b></td>
      </tr>
       <?php while ($user= mysqli_fetch_assoc($data)) {?>
      <tr>
        <td><?php echo $user["fullname"]; ?></td>
        <td><?php echo $user["username"]; ?></td>
        <td><?php echo $user["password"]; ?></td>
        <td><?php echo $user["admin"]; ?></td>
        <td>
          <a class="btn btn-primary" href="users_edit.php?id=<?php echo $user["id"];?>">Edit</a>
          <a class="btn btn-danger" href="users_list.php?id=<?php echo $user["id"];?>">Delete</a>
        </td>
      <?php }?>
      </tr>

    </table>
  </body>
</html>
