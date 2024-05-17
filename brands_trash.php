<?php
include 'basic.php';
if (isset($_GET["id"])){
  brands_delete($_GET["id"],$_GET["action"]);
}
$data=brands_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Brands Trash - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
    <h1 class="display-1">Brands Trash</h1>
    <a class="btn btn-dark" href="brands_new.php">Brands New</a>
    <table class="table table-success table-bordered table-striped mt-4">
      <tr>
      <td><b>Name</b></td>
      <td><b>Actions</b></td>
      </tr>
    <?php while($brand = mysqli_fetch_assoc($data)) {?>
    <tr>
      <td><?php echo $brand["name"]; ?></td>
      <td>
        <a class="btn btn-primary" href="brands_trash.php?id=<?php echo $brand["id"];?>&action=restore">Restore</a>
        <a class="btn btn-danger" href="brands_trash.php?id=<?php echo $brand["id"];?>&action=forever">Delete Forever</a>
      </td>
    </tr>
  <?php } ?>
    </table>
  </body>
</html>
