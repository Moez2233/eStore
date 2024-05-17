<?php
include 'basic.php';
 if (isset($_GET["id"])){
   employees_delete($_GET["id"],$_GET["action"]);
 }
$data=employees_list("deleted");

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee Trash - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Employee Trash</h1>
        <a class="btn btn-dark mb-5" href="employee_new.php">New employee</a>
        <table class="table table-dark table-bordered table-striped">
          <tr>
          <td><b>Image</b></td>
          <td><b>Name</b></td>
          <td><b>Phone</b></td>
          <td><b>Address</b></td>
          <td><b>Email</b></td>
          <td><b>Department ID</b></td>
          <td><b>Basic Salary</b></td>
          <td><b>Actions</b></td>

          </tr>
    <?php while ($employee=mysqli_fetch_assoc($data)) {?>
          <tr>
            <td><?php echo $employee["image"]; ?></td>
            <td><?php echo $employee["name"]; ?></td>
            <td><?php echo $employee["phone"]; ?></td>
            <td><?php echo $employee["address"]; ?></td>
            <td><?php echo $employee["email"]; ?></td>
            <td><?php echo $employee["department_name"]; ?></td>
            <td><?php echo $employee["basic_salary"]; ?></td>

            <td>
              <a class="btn btn-primary" href="employee_trash.php?id=<?php echo $employee["id"];?>&action=restore">Restore</a>
              <a class="btn btn-danger" href="employee_trash.php?id=<?php echo $employee["id"];?>&action=forever">Delete Forever</a>
            </td>
          </tr>
    <?php } ?>
    </table>
  </body>
</html>
