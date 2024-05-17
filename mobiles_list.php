<?php
include 'basic.php';
 if (isset($_GET["id"])){
   mobiles_delete($_GET["id"],"deleted");
 }
$data=mobiles_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mobiles List - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
    <h2 class="display-1">Mobiles List</h2>
    <a class="btn btn-dark mb-5" href="mobiles_new.php">New Mobile</a>
    <div class="container">
      <div class="row">
        <table class="table table-dark table-bordered table-striped">
          <tr>
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
      <td> <img class="mobile-logo" src="img/mobiles/<?php echo $mobile["image"]; ?>" > </td>
      <td><?php echo $mobile["model_name"] ?></td>
      <td><?php echo $mobile["color_name"] ?></td>
      <td><?php echo $mobile["price"] ?></td>
      <td><?php echo $mobile["year_name"] ?></td>
      <td>
        <a class="btn btn-primary" href="mobiles_edit.php?id=<?php echo $mobile["id"];?>">Edit</a>
        <a class="btn btn-danger"  href="mobiles_list.php?id=<?php echo $mobile["id"];?>">Delete</a>
      </td>
    </tr>
  <?php } ?>
    </table>
  </body>
</html>
