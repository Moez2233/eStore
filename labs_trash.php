<?php
include 'basic.php';
 if (isset($_GET["id"])){
   labs_delete($_GET["id"],$_GET["action"]);
 }
$data=labs_list("deleted");

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>labs Trash - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
      <div class="row">
        <h2 class="display-1">labs Trash </h2>
        <a class="btn btn-dark mb-5" href="labs_new.php">New lab</a>
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
    <?php while($lab = mysqli_fetch_assoc($data)) {?>
    <tr>
      <td><?php echo $lab["id"]; ?></td>
      <td><?php echo $lab["image"] ?></td>
      <td><?php echo $lab["model_name"] ?></td>
      <td><?php echo $lab["color_name"] ?></td>
      <td><?php echo $lab["price"] ?></td>
      <td><?php echo $lab["year_name"] ?></td>
      <td>
        <a class="btn btn-primary" href="labs_trash.php?id=<?php echo $lab["id"];?>&action=restore">Restore</a>
        <a class="btn btn-danger"  href="labs_trash.php?id=<?php echo $lab["id"];?>&action=forever">Delete Forever</a>
      </td>
    </tr>
  <?php } ?>
    </table>
  </body>
</html>
