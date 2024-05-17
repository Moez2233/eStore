<?php
include 'basic.php';
if (isset($_POST["id"])) {
  employees_update($_POST["id"],$_POST["name"],$_FILES["image"],$_POST["phone"],$_POST["address"],
$_POST["email"],$_POST["department_id"],$_POST["basic_salary"]);
  }
$employee=employees_edit($_GET ["id"]);
$departments_list=departments_list();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit employee - <?php echo $app_name; ?> </title>
    <?php include 'style.php'; ?>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="width:700px";>
      <div class="row" style="margin-top:50px";>
        <h1 class="display-1 text-primary">Edit Employee</h1>
        <form action="employee_edit.php" method="post" enctype="multipart/form-data" style="border:3px solid#f1f1f1";>
          <div class="form-group">
          <input type="hidden" name="id" class="form-control" value="<?php echo $employee["id"]; ?>">
          <div class="form-group">
            <div class="form-group">
              <label for="image">Image</label>
              <img class="employee-logo"src="img/employees/<?php echo $employee['image'];?>">
              <input class="form-control" type="file" name="image"><br><br>
          <div class="form-group">
          <label >name</label>
          <input type="text" name="name"class="form-control" value="<?php echo $employee["name"]; ?>">
          <div class="form-group">
          <label >phone</label>
          <input type="text" name="phone"class="form-control" value="<?php echo $employee["phone"]; ?>">
          <div class="form-group">
          <label >address</label>
          <input type="text" name="address"class="form-control" value="<?php echo $employee["address"]; ?>">
          <div class="form-group">
          <label >email</label>
          <input type="email" name="email"class="form-control" value="<?php echo $employee["email"]; ?>">
          <div class="form-group">
          <label >department id</label>
          <select class="form-control" name="department_id">
            <?php while ($department=mysqli_fetch_assoc($departments_list)) {?>
            <option <?php if($department["id"]==$employee["department_id"]) {echo "SELECTED";}?>
              value="<?php echo $department["id"]; ?>"><?php echo $department["name"]; ?></option>
          <?php } ?>
          </select>
          <div class="form-group">
          <label >basic salary</label>
          <input type="text" name="basic_salary"class="form-control" value="<?php echo $employee["basic_salary"]; ?>">
          <button type="submit" name="button" class="btn btn-dark">Save</button>
          <a href="#" class="btn btn-warning">Back</a>
      </div>
      </div>
    </form>
  </body>
</html>
