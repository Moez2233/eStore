<?php
include 'basic.php';
if (isset($_GET["id"])){
  colors_delete($_GET["id"],"deleted");
}
$data=colors_list();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Colors List - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
    <h1 class="display-1 text-success">Colors List</h1>
    <a class="btn btn-dark mb-3 " href="colors_new">New Colors</a>
    <div class="container">
      <div class="row">
        <table class="table table-dark table-bordered table-striped ">
          <tr>
          <td><b>Name</b></td>
          <td><b>Code</b></td>
          <td><b>Actions</b></td>
          </tr>
          <?php while ($color=mysqli_fetch_assoc($data)) {?>
          <tr>
            <td><?php echo $color["name"]; ?></td>
            <td><?php echo $color["code"]; ?></td>
            <td>
              <a class="btn btn-primary" href="colors_edit.php?id=<?php echo $color["id"]; ?>">Edit</a>
              <a class="btn btn-danger" href="colors_list.php?id=<?php echo $color["id"]; ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
        </table>
      </div>
    </div>
  </body>
</html>
