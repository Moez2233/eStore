<?php
include 'basic.php';
if (isset($_POST["id"])) {
years_update( $_POST["id"], $_POST["name"]);

}
$year=years_edit($_GET ["id"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>years edit - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1 text-primary">Edit years</h1>
        <form  action="years_edit.php" method="post">
          <div class="form-group">
          <label for="id">ID</label>
          <input type="text" name="id"class="form-control"value="<?php echo $year['id']; ?>"><br><br>
          <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name"class="form-control"value="<?php echo $year['name']; ?>"><br><br>
          <button type="submit" name="button" class="btn btn-dark">Save</button>
          <a href="#" class="btn btn-warning">Back</a>
      </div>
      </div>
    </form>
  </body>
</html>
