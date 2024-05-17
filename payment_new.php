<?php
include 'basic.php';
if (isset($_POST["name"])) {
  payment_new($_POST["name"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Payment Method - <?php echo $app_name;?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">New payment_method</h1>
        <form  action="payment_new.php" method="post">
        <div class="form-group" >
        <label for="Name">Name</label>
        <input type="text" name="name"class="form-control"><br><br>
        <button type="submit" name="button" class="btn btn-dark">Save</button>
       <a href="#"  class="btn btn-secondary">Back</a>
   </div>
 </div>
</form>
  </body>
</html>
