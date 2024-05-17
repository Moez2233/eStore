<?php
include 'basic.php';
 if (isset($_GET["id"])){
   employees_delete($_GET["id"],"deleted");
 }
$data=employees_list();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee List - <?php echo $app_name; ?></title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
    <h1 class="display-1">Employee List</h1>
    <a class="btn btn-dark mb-4 " href="employee_new.php">New Employee</a>
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
            <td> <img class="employee-logo" src="img/employees/<?php echo $employee["image"]; ?>" > </td>
            <td><?php echo $employee["name"]; ?></td>
            <td><?php echo $employee["phone"]; ?></td>
            <td><?php echo $employee["address"]; ?></td>
            <td><?php echo $employee["email"]; ?></td>
            <td><?php echo $employee["department_name"]; ?></td>
            <td><?php echo $employee["basic_salary"]; ?></td>

            <td>
              <a class="btn btn-primary" href="employee_edit.php?id=<?php echo $employee["id"];?>">Edit</a>
              <a class="btn btn-danger" href="employee_list.php?id=<?php echo $employee["id"];?>">Delete</a>
            </td>
          </tr>
    <?php } ?>
    </table>
  </div>
  </body>
</html>
