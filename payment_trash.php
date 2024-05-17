<?php
include 'basic.php';
 if (isset($_GET["id"])){
   payment_delete($_GET["id"],"restore");
 }
$data=payment_list("deleted");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Paymentd Method Trash - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
    </head>
    <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">payment_methods Trash</h1>
        <a class="btn btn-dark mb-5" href="payment_new.php">New payment_methods</a>
        <table class="table table-dark table-bordered table-striped">
            <tr>
            <td><b>ID</b></td>
            <td><b>Name</b></td>
            <td><b>Actions</b></td>
            </tr>
      <?php while ($payment_method=mysqli_fetch_assoc($data)) {?>
            <tr>
              <td><?php echo $payment_method["id"]; ?></td>
              <td><?php echo $payment_method["name"]; ?></td>
              <td>
                <a class="btn btn-primary" href="payment_trash.php?id=<?php echo $payment_method["id"];?>">Restore</a>
                <a class="btn btn-danger" href="payment_list.php?id=<?php echo $payment_method["id"];?>">Delete</a>
              </td>
            </tr>
      <?php } ?>
    </table>
  </body>
</html>
