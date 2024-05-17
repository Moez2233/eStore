<?php
include 'basic.php';
if (isset($_GET["id"])){
  colors_delete($_GET["id"],"restore");
}
$data=colors_list("deleted");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Colors Trash - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
    <h1 class="display-1 text-success">Colors Trash</h1>
    <a class="btn btn-dark mb-4" href="colors_new">New Colors</a>
    <div class="container">
      <div class="row">
        <table class="table table-dark table-bordered table-striped ">
          <tr>
          <td><b>ID</b></td>
          <td><b>Name</b></td>
          <td><b>Code</b></td>
          <td><b>Actions</b></td>
          </tr>
          <?php while ($color=mysqli_fetch_assoc($data)) {?>
          <tr>
            <td><?php echo $color["id"]; ?></td>
            <td><?php echo $color["name"]; ?></td>
            <td><?php echo $color["code"]; ?></td>
            <td>
              <a class="btn btn-primary" href="colors_trash.php?id=<?php echo $color["id"]; ?>">Restore</a>
              <a class="btn btn-danger" href="colors_list.php?id=<?php echo $color["id"]; ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
        </table>
      </div>
    </div>
  </body>
</html>
