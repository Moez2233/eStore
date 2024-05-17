<?php
include 'basic.php';
if (isset($_POST["id"])) {
colors_update($_POST["id"],$_POST["name"],$_POST["code"]);
}
$color=colors_edit($_GET ["id"]);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Color</title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <h1 class="display-1 text-primary" >Edit color</h1>
    <form action="colors_edit.php" method="post">
      <div class="container">
        <div class="row">
          <label for="id">ID</label>
          <input type="hidden" name="id"value="<?php echo $color['id'];?>"><br><br>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <label for="Name">Name</label>
          <input type="text" name="name"value="<?php echo $color['name'];?>"><br><br>
        </div>
      </div>
      <div class="container">
        <div class="row">
            <label for="Code">Code</label>
            <input type="text" name="code"value="<?php echo $color['code'];?>"><br><br>
      <button class="btn btn-secondary  " type="submit" name="button">Save</button>
      <a class="btn btn-danger " href="#">Back</a>
    </form>
  </body>
</html>
