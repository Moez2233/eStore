<?php
include 'basic.php';
 if (isset($_GET["id"])){
   mobiles_delete($_GET["id"],$_GET["action"]);
 }
$data=mobiles_list("deleted");

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mobiles Trash - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
      <div class="row">
        <h2 class="display-1">Mobiles Trash </h2>
        <a class="btn btn-dark mb-5" href="mobiles_new.php">New Mobile</a>
        <table class="table table-dark table-bordered table-striped">
          <tr>
          <td><b>ID</b></td>
          <td><b>Image</b></td>
          <td><b>Model ID</b></td>
          <td><b>Color ID</b></td>
          <td><b>Price </b></td>
          <td><b>Year ID</b></td>
          <td><b>Actions</b></td>
          </tr>
      </div>
    </div>
    <?php while($mobile = mysqli_fetch_assoc($data)) {?>
    <tr>
      <td><?php echo $mobile["id"]; ?></td>
      <td><?php echo $mobile["image"] ?></td>
      <td><?php echo $mobile["model_name"] ?></td>
      <td><?php echo $mobile["color_name"] ?></td>
      <td><?php echo $mobile["price"] ?></td>
      <td><?php echo $mobile["year_name"] ?></td>
      <td>
        <a class="btn btn-primary" href="mobiles_trash.php?id=<?php echo $mobile["id"];?>&action=restore">Restore</a>
        <a class="btn btn-danger"  href="mobiles_trash.php?id=<?php echo $mobile["id"];?>&action=forever">Delete Forever</a>
      </td>
    </tr>
  <?php } ?>
    </table>
  </body>
</html>
