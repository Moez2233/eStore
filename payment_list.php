<?php
include 'basic.php';
if (isset($_GET["id"])){
  payment_delete($_GET["id"],"deleted");
}
$data=payment_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Paymentd Method List  - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
    </head>
    <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1 class="display-1">payment_methods List</h1>
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
                <a class="btn btn-primary" href="payment_edit.php?id=<?php echo $payment_method["id"];?>">Edit</a>
                <a class="btn btn-danger" href="payment_list.php?id=<?php echo $payment_method["id"];?>">Delete</a>
              </td>
            </tr>
      <?php } ?>
    </table>
  </body>
</html>
