<?php
include 'basic.php';
 if (isset($_GET["id"])){
   customers_delete($_GET["id"],"deleted");
 }
$data=customers_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customers List - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php';?>
    <div class="container">
  <h1 class="display-1 text-primary">Customers List</h1>
  <a class="btn btn-dark mb-4 " href="customers_new.php">New Customer</a>
    <table class="table table-dark table-bordered table-striped ">
      <tr>
      <td><b>Image</b></td>
      <td><b>Name</b></td>
      <td><b>Phone</b></td>
      <td><b>Address</b></td>
      <td><b>Email</b></td>
      <td><b>Bdate</b></td>
      <td><b>City ID</b></td>
      <td><b>Actions</b></td>

      </tr>
      <?php while ($customer= mysqli_fetch_assoc($data)) {?>

      <tr>
        <td> <img class="customer-logo" src="img/customers/<?php echo $customer["image"]; ?>" > </td>
        <td><?php echo $customer["name"]; ?></td>
        <td><?php echo $customer["phone"]; ?></td>
        <td><?php echo $customer["address"]; ?></td>
        <td><?php echo $customer["email"]; ?></td>
        <td><?php echo $customer["bdate"]; ?></td>
        <td><?php echo $customer["cityname"]; ?></td>
        <td>
          <a class="btn btn-primary" href="customers_edit.php?id=<?php echo $customer["id"];?>">Edit</a>
          <a class="btn btn-danger" href="customers_list.php?id=<?php echo $customer["id"];?>">Delete</a>
        </td>
      </tr>
    <?php } ?>
    </table>
  </body>
</html>
