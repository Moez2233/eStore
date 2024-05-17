<?php
include 'basic.php';
if (isset($_POST["id"])) {
  brands_update($_POST["id"],$_POST["name"],$_FILES["image"]);
}
$brand=brands_edit($_GET ["id"]);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Brands - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
    <form action="brands_edit.php" method="post" enctype="multipart/form-data" style="border:3px solid#f1f1f1";>
      <h1 class="display-1 text-primary">Edit Brands</h1>
          <label for="id">ID</label>
          <input type="hidden" name="id" value="<?php echo $brand['id'];?>"><br><br>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <label for="image">Image</label>
          <img class="brand-logo"src="img/brands/<?php echo $brand['image'];?>">
          <input type="file" name="image"><br><br>
        </div>
      </div>
      <div class="container">
        <div class="row">
            <label for="Name">Name</label>
            <input type="text" name="name" value="<?php echo $brand['name'];?>"><br><br>
        </div>
      </div>
      <button class="btn btn-secondary" type="submit" name="button">Save</button>
      <a class="btn btn-danger " href="#">Back</a>
    </form>
  </body>
</html>
