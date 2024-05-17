<?php
include 'basic.php';
 if (isset($_GET["id"])){
   brands_delete($_GET["id"],"deleted");
 }
$data=brands_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Brands List - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
    <h1 class="display-1">Brands List</h1>
    <a class="btn btn-dark" href="brands_new.php">Brands New</a>
    <table class="table table-success table-bordered table-striped mt-4">
      <tr>
      <td><b>Image</b></td>
      <td><b>Mobile Name</b></td>
      <td><b>Actions</b></td>
      </tr>
    <?php while($brand = mysqli_fetch_assoc($data)) {?>
    <tr>
      <td><img class="brand-logo" src="img/brands/<?php echo $brand["image"]; ?>"></td>
      <td><?php echo $brand["name"]; ?></td>
      <td>
        <a class="btn btn-primary" href="brands_edit.php?id=<?php echo $brand["id"];?>">Edit</a>
        <a class="btn btn-danger" href="brands_list.php?id=<?php echo $brand["id"];?>">Delete</a>
      </td>
    </tr>
  <?php } ?>
    </table>

  </body>
</html>
