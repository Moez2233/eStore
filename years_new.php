<?php
include 'basic.php';
if (isset($_POST["name"])) {
 years_new($_POST["name"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>new year  - <?php echo $app_name;?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
    <h1 class="display-1 text-success">New year</h1>
    <form action="years_new.php" method="post">
      <div class="container">
        <div class="row">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control"><br><br>
              <button type="submit" name="button" class="btn btn-dark">Save</button>
              <a href="#"  class="btn btn-secondary">Back</a>
          </div>
          </div>
    </form>
  </body>
</html>
