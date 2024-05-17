<?php
include 'basic.php';
if (isset($_POST["id"])) {
  departments_update($_POST["id"],$_POST["name"]);
}
$department=departments_edit($_GET ["id"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Department - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <form action="departments_edit.php" method="post">
      <div class="container">
        <h1 class="display-1 text-danger">Edit Department</h1>
          <div class="form-group">
          <label for="id">ID</label>
          <input type="text" name="id"class="form-control"value="<?php echo $department['id'];?>"><br><br>
          <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name"class="form-control"value="<?php echo $department['name'];?>"><br><br>
          <button type="submit" name="button" class="btn btn-dark">Save</button>
          <a href="#" class="btn btn-warning">Back</a>
        </div>
      </div>
    </form>
  </body>
</html>
