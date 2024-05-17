<?php
include 'basic.php';
 if (isset($_GET["id"])){
   models_delete($_GET["id"],$_GET["action"]);
 }
$data=models_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Models Trash  - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1 class="display-1 text-warning">Model Trash</h1>
        <a class="btn btn-dark mb-4" href="model_new.php">New model</a>
        <table class="table table-dark table-bordered table-striped">
            <tr>
            <td><b>ID</b></td>
            <td><b>Name</b></td>
            <td><b>Brand</b></td>
            <td><b>Actions</b></td>
            </tr>
          <?php while($model = mysqli_fetch_assoc($data)) {?>
            <tr>
              <td><?php echo $model["id"]; ?></td>
              <td><?php echo $model["name"] ?></td>
              <td><?php echo $model["brand_name"] ?></td>

              <td>
                <a class="btn btn-primary" href="model_trash.php?id=<?php echo $model["id"];?>&action=restore">Restore</a>
                <a class="btn btn-danger" href="model_trash.php?id=<?php echo $model["id"];?>&action=forever">Delete Forever</a>
              </td>
            </tr>
            </tr>
        <?php } ?>
    </table>
  </body>
</html>
