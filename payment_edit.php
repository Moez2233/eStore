<?php
include 'basic.php';
if (isset($_POST["id"])) {
  payment_update($_POST["id"],$_POST["name"]);

  }
  $payment=payment_edit($_GET ["id"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Payment Method - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1 text-primary">Edit payment_methods</h1>
          <form action="payment_edit.php" method="post">
            <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" class="form-control"value="<?php echo $payment['id']; ?>"><br><br>
            <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name"class="form-control"value="<?php echo $payment['name']; ?>"><br><br>
            <button type="submit" name="button" class="btn btn-dark">Save</button>
            <a href="#" class="btn btn-warning">Back</a>
        </div>
        </div>
    </form>
  </body>
</html>
