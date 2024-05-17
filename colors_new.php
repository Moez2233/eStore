<?php
include 'basic.php';
if (isset($_POST["name"])) {
colors_new($_POST["name"],$_POST["code"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New color - <?php echo $app_name;?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
    <h1 class="display-1 text-success">New Color</h1>
    <form  action="colors_new.php" method="post">
  <div class="form-group" >
    <label for="Name">Name</label>
    <input type="text" name="name"class="form-control"><br><br>
  <div class="form-group" >
    <label for="Code">Code</label>
    <input type="text" name="code"class="form-control"><br><br>
    <button type="submit" name="button" class="btn btn-dark">Save</button>
   <a href="#"  class="btn btn-secondary">Back</a>
</form>
  </body>
</html>
